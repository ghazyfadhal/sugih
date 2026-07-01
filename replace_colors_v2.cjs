const fs = require('fs');
const path = require('path');

const replacements = {
    // We swap mustard to green, and green to gold.
    'sugih-green': 'sugih-TEMP',
    'sugih-mustard': 'sugih-green',
    'sugih-TEMP': 'sugih-gold'
};

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        isDirectory ? walkDir(dirPath, callback) : callback(path.join(dir, f));
    });
}

let modifiedCount = 0;

function processFiles(dir) {
    walkDir(dir, function(filePath) {
        if (filePath.endsWith('.blade.php') || filePath.endsWith('.css')) {
            let content = fs.readFileSync(filePath, 'utf8');
            let originalContent = content;
            
            // Apply replacements in order
            for (const [oldStr, newStr] of Object.entries(replacements)) {
                const regex = new RegExp(oldStr + '(?![a-zA-Z0-9_-])', 'g');
                content = content.replace(regex, newStr);
            }
            
            if (content !== originalContent) {
                fs.writeFileSync(filePath, content);
                modifiedCount++;
                console.log(`Updated ${filePath}`);
            }
        }
    });
}

processFiles('./resources/views');
processFiles('./resources/css');

console.log(`Replaced colors in ${modifiedCount} files.`);
