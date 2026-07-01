const fs = require('fs');
const path = require('path');

const replacements = {
    // Backgrounds
    'bg-sugih-ivory': 'bg-sugih-base',
    'bg-sugih-cream': 'bg-sugih-surface',
    'bg-sugih-charcoal': 'bg-sugih-dark',
    'bg-sugih-walnut': 'bg-sugih-dark',
    
    // Text colors
    'text-sugih-ivory': 'text-sugih-base',
    'text-sugih-cream': 'text-sugih-surface',
    'text-sugih-charcoal': 'text-sugih-primary',
    'text-sugih-gray': 'text-sugih-secondary',
    'text-sugih-muted': 'text-sugih-secondary',
    
    // Brand & Accents
    'bg-sugih-brown': 'bg-sugih-green',
    'text-sugih-brown': 'text-sugih-green',
    'border-sugih-brown': 'border-sugih-green',
    
    'text-sugih-gold': 'text-sugih-mustard',
    'bg-sugih-gold': 'bg-sugih-mustard',
    'border-sugih-gold': 'border-sugih-mustard',
    'decoration-sugih-gold': 'decoration-sugih-mustard',
    
    // Borders
    'border-sugih-tan': 'border-sugih-subtle',
    'decoration-sugih-tan': 'decoration-sugih-subtle',
};

function walkDir(dir, callback) {
    fs.readdirSync(dir).forEach(f => {
        let dirPath = path.join(dir, f);
        let isDirectory = fs.statSync(dirPath).isDirectory();
        isDirectory ? walkDir(dirPath, callback) : callback(path.join(dir, f));
    });
}

let modifiedCount = 0;

walkDir('./resources/views', function(filePath) {
    if (filePath.endsWith('.blade.php')) {
        let content = fs.readFileSync(filePath, 'utf8');
        let originalContent = content;
        
        for (const [oldClass, newClass] of Object.entries(replacements)) {
            // Regex match with word boundaries and hyphen lookaheads
            const regex = new RegExp(oldClass + '(?![a-zA-Z0-9_-])', 'g');
            content = content.replace(regex, newClass);
        }
        
        if (content !== originalContent) {
            fs.writeFileSync(filePath, content);
            modifiedCount++;
            console.log(`Updated ${filePath}`);
        }
    }
});

console.log(`Replaced colors in ${modifiedCount} files.`);
