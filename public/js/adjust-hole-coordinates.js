/**
 * Helper script untuk menghitung koordinat lubang frame yang tepat
 *
 * Gunakan script ini untuk menghitung Y coordinates setelah mengubah height lubang
 */

// Konfigurasi frame
const frameConfig = {
    width: 867,
    height: 2048,
    // Koordinat saat ini (aspect ratio 1.1875)
    currentHoles: [
        { x: 53, y: 40, width: 760, height: 640 },
        { x: 53, y: 720, width: 760, height: 640 },
        { x: 53, y: 1400, width: 760, height: 640 }
    ]
};

// Opsi 1: Ubah height menjadi 570 (4:3 ratio, maintain width)
console.log('=== OPTION 1: Maintain Width 760, Change Height to 570 (4:3 ratio) ===');
const newHeight1 = 570;
const gap = 40; // Gap antar lubang (dapat disesuaikan)

const option1Holes = [];
frameConfig.currentHoles.forEach((hole, index) => {
    if (index === 0) {
        option1Holes.push({ x: hole.x, y: hole.y, width: hole.width, height: newHeight1 });
    } else {
        // Calculate Y based on previous hole
        const prevHole = option1Holes[index - 1];
        const newY = prevHole.y + prevHole.height + gap;
        option1Holes.push({ x: hole.x, y: newY, width: hole.width, height: newHeight1 });
    }
});

option1Holes.forEach((hole, i) => {
    console.log(`Hole ${i + 1}: { x: ${hole.x}, y: ${hole.y}, width: ${hole.width}, height: ${hole.height} }`);
});

// Verify aspect ratio
option1Holes.forEach((hole, i) => {
    const aspectRatio = hole.width / hole.height;
    console.log(`  Hole ${i + 1} aspect ratio: ${aspectRatio.toFixed(4)} ${aspectRatio === 4/3 ? '✓ Perfect 4:3' : '✗ Not 4:3'}`);
});

// Opsi 2: Ubah width menjadi 853 (4:3 ratio, maintain height)
console.log('\n=== OPTION 2: Maintain Height 640, Change Width to 853 (4:3 ratio) ===');
const newWidth2 = 853;
// X coordinate perlu disesuaikan jika frame tidak cukup lebar
// Biasanya center the hole: (frameWidth - holeWidth) / 2
const newX2 = Math.round((frameConfig.width - newWidth2) / 2);

const option2Holes = frameConfig.currentHoles.map(hole => ({
    x: newX2,
    y: hole.y,
    width: newWidth2,
    height: hole.height
}));

option2Holes.forEach((hole, i) => {
    console.log(`Hole ${i + 1}: { x: ${hole.x}, y: ${hole.y}, width: ${hole.width}, height: ${hole.height} }`);
});

// Verify aspect ratio
option2Holes.forEach((hole, i) => {
    const aspectRatio = hole.width / hole.height;
    console.log(`  Hole ${i + 1} aspect ratio: ${aspectRatio.toFixed(4)} ${Math.abs(aspectRatio - 4/3) < 0.01 ? '✓ Perfect 4:3' : '✗ Not 4:3'}`);
});

// Export untuk copy-paste
console.log('\n=== COPY-PASTE READY CODE ===');
console.log('// Option 1 (maintain width, change height to 570):');
console.log('photoHoles: [');
option1Holes.forEach((hole, i) => {
    const comma = i < option1Holes.length - 1 ? ',' : '';
    console.log(`    { x: ${hole.x}, y: ${hole.y}, width: ${hole.width}, height: ${hole.height} }${comma}`);
});
console.log(']');

console.log('\n// Option 2 (maintain height, change width to 853):');
console.log('photoHoles: [');
option2Holes.forEach((hole, i) => {
    const comma = i < option2Holes.length - 1 ? ',' : '';
    console.log(`    { x: ${hole.x}, y: ${hole.y}, width: ${hole.width}, height: ${hole.height} }${comma}`);
});
console.log(']');

// Catatan penting
console.log('\n=== PENTING ===');
console.log('1. Koordinat di atas adalah ESTIMASI berdasarkan gap 40px antar lubang');
console.log('2. Gunakan frame-coordinate-helper.html untuk mendapatkan koordinat PERSIS dari frame PNG Anda');
console.log('3. Pastikan koordinat sesuai dengan area TRANSPARAN di frame PNG');
console.log('4. Jika area transparan di frame PNG tidak berbentuk 4:3, foto akan tetap di-crop (ini normal)');