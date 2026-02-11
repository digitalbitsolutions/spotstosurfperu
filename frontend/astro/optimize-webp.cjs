const sharp = require('sharp');
const fs = require('fs');
const path = require('path');

const directory = 'public/images';
const files = fs.readdirSync(directory);

const imageSpecs = {
    'hero.webp': { width: 1920 },
    'costaperuana.webp': { width: 1200 },
    'paragliding.webp': { width: 800 },
    'lobitos.webp': { width: 800 },
    'chicama.webp': { width: 800 },
    'caboblanco.webp': { width: 800 },
    'pacasmayo.webp': { width: 800 },
    'surf.webp': { width: 800 },
    'gastronomy.webp': { width: 800 },
    'transport.webp': { width: 800 },
    'about-lima.webp': { width: 800 }
};

async function optimizeImages() {
    for (const file of files) {
        if (file.endsWith('.webp')) {
            const inputPath = path.join(directory, file);
            const outputPath = path.join(directory, `opt-${file}`);

            const spec = imageSpecs[file] || { width: 1000 };

            try {
                await sharp(inputPath)
                    .resize({ width: spec.width, withoutEnlargement: true })
                    .webp({ quality: 75, effort: 6 })
                    .toFile(outputPath);

                const stats = fs.statSync(inputPath);
                const optStats = fs.statSync(outputPath);

                console.log(`Optimized ${file}: ${Math.round(stats.size / 1024)}KB -> ${Math.round(optStats.size / 1024)}KB`);

                fs.unlinkSync(inputPath);
                fs.renameSync(outputPath, inputPath);
            } catch (err) {
                console.error(`Error optimizing ${file}:`, err);
            }
        }
    }
}

optimizeImages();
