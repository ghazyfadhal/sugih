const fs = require('fs');
const path = require('path');

const replacements = {
    // Green becomes Mustard (Primary)
    // Gold becomes Green (Secondary)
    'sugih-green': 'sugih-TEMP',
    'sugih-gold': 'sugih-green',
    'sugih-TEMP': 'sugih-mustard'
};

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        isDirectory ? 
            walkDir(dirPath, callback) : callback(path.join(dir, f));
    });
}

function processFiles() {
    const directories = [
        path.join(__dirname, 'resources', 'views'),
        path.join(__dirname, 'resources', 'css')
    ];

    let filesToProcess = [];
    directories.forEach(dir => {
        walkDir(dir, function(filePath) {
            if (filePath.endsWith('.blade.php') || filePath.endsWith('.css')) {
                filesToProcess.push(filePath);
            }
        });
    });

    filesToProcess.forEach(file => {
        let content = fs.readFileSync(file, 'utf8');
        let original = content;
        
        for (const [oldClass, newClass] of Object.entries(replacements)) {
            // Match class names exactly using regex to avoid partial matches
            const regex = new RegExp(oldClass, 'g');
            content = content.replace(regex, newClass);
        }

        if (content !== original) {
            fs.writeFileSync(file, content, 'utf8');
            console.log(`Updated: ${file}`);
        }
    });
}

processFiles();
console.log('Color classes swapped successfully to Clean Mustard hierarchy.');
