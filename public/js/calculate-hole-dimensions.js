/**
 * Calculator untuk menghitung dimensi lubang frame yang sesuai dengan aspect ratio foto
 *
 * Foto 4:3 memiliki aspect ratio = 1.3333 (1920x1440)
 *
 * Jika ingin lubang frame sesuai dengan aspect ratio 4:3:
 */

// Opsi 1: Berdasarkan width yang sudah ada (760px)
const width1 = 760;
const height1 = width1 / (4 / 3); // = 760 / 1.3333 = 570px
console.log(`Option 1: Width ${width1}px → Height ${height1.toFixed(0)}px (4:3 ratio)`);
// Hasil: { x: 53, y: 40, width: 760, height: 570 }

// Opsi 2: Berdasarkan height yang sudah ada (640px)
const height2 = 640;
const width2 = height2 * (4 / 3); // = 640 * 1.3333 = 853.33px
console.log(`Option 2: Height ${height2}px → Width ${width2.toFixed(0)}px (4:3 ratio)`);
// Hasil: { x: 53, y: 40, width: 853, height: 640 }

// Opsi 3: Mempertahankan width, sesuaikan height sedikit
const width3 = 760;
const height3 = 640; // Current
const currentRatio = width3 / height3; // 1.1875
const photoRatio = 4 / 3; // 1.3333
console.log(`Option 3: Current ratio ${currentRatio.toFixed(4)} vs Photo ratio ${photoRatio.toFixed(4)}`);
console.log(`  Difference: ${((photoRatio - currentRatio) * 100).toFixed(2)}%`);

// Hitung koordinat baru jika menggunakan aspect ratio 4:3
console.log('\n=== Recommended Hole Dimensions for 4:3 Photos ===');
console.log('Option A (maintain width 760):');
console.log(`  { x: 53, y: 40, width: 760, height: ${Math.round(height1)} }`);
console.log(`  Aspect ratio: ${(760/Math.round(height1)).toFixed(4)}`);

console.log('\nOption B (maintain height 640):');
console.log(`  { x: 53, y: 40, width: ${Math.round(width2)}, height: 640 }`);
console.log(`  Aspect ratio: ${(Math.round(width2)/640).toFixed(4)}`);

console.log('\n=== Current Dimensions ===');
console.log('Current: { x: 53, y: 40, width: 760, height: 640 }');
console.log(`Aspect ratio: ${(760/640).toFixed(4)}`);
console.log(`Photo aspect ratio: ${(4/3).toFixed(4)}`);
console.log(`Mismatch: ${((4/3) - (760/640)).toFixed(4)}`);

// Ekspor untuk digunakan
module.exports = {
        option1: { x: 53, y: 40, width: 760, height: Math.round(height1) },
        option2: { x: 53, y: 40, width: Math.round(width2), height: 640 },
        current: { x: 53, y: 40, width: 760, height: 640 }