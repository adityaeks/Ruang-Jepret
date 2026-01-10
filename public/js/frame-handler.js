/**
 * Frame Handler Module
 * Handles all frame PNG related logic for photo booth templates
 */

class FrameHandler {
    constructor() {
        // Shared configuration for all 4:3 frames (same dimensions and photo holes)
        // Semua frame dengan ukuran yang sama share config ini
        const sharedConfig = {
            width: 867,
            height: 2048,
            photoHoles: [
                // UPDATED: Changed height from 640 to 570 for perfect 4:3 aspect ratio (1.3333)
                // Aspect ratio: 760/570 = 1.3333 (perfect match with 4:3 photos)
                // Y coordinates: Reduced for photos 2 and 3 to eliminate space above
                { x: 53, y: 40, width: 760, height: 570 },
                { x: 53, y: 643, width: 760, height: 570 }, // Y: 40 + 570 - 30 = 580 (reduced by 70px to move up)
                { x: 53, y: 1244, width: 760, height: 570 } // Y: 580 + 570 - 30 = 1120 (reduced by 140px to move up)
            ],
            adjustments: {
                offsetX: 0, // Adjust X position for all holes
                offsetY: 0, // Adjust Y position for all holes
                padding: 0 // Padding inside each hole (negative = expand, positive = shrink)
            }
        };

        // Multiple frame configurations dengan ukuran yang sama
        //
        // CARA MENAMBAHKAN FRAME VERSI BARU:
        // 1. Simpan file PNG frame baru di folder public/frames/
        // 2. Pastikan ukuran frame PNG sama dengan frame yang ada (867x2048)
        // 3. Pastikan posisi photo holes (transparent areas) sama dengan frame yang ada
        // 4. Uncomment dan tambahkan konfigurasi frame baru di bawah ini
        // 5. Ganti 'frame-v2' dengan ID unik, 'Frame Versi 2' dengan nama, dan path dengan lokasi file PNG
        //
        // Contoh:
        // 'frame-v2': {
        //     id: 'frame-v2',
        //     name: 'Frame Versi 2',
        //     path: '/frames/frame-4x3-3photos-v2.png',
        //     ...sharedConfig  // Menggunakan shared config (dimensi dan photoHoles yang sama)
        // }
        this.frameConfigs = {
            'frame-v1': {
                id: 'frame-v1',
                name: 'Default',
                path: '/frames/frame-4x3-3photos.png',
                aspectRatio: '4:3', // Rasio foto yang didukung oleh frame ini
                ...sharedConfig
            },
            // Uncomment dan sesuaikan untuk menambahkan frame versi lain:
            // ,
            'frame-v2': {
                id: 'frame-v2',
                name: 'Bear v1',
                path: '/frames/frame-4x3-3photos-v2.png',
                aspectRatio: '4:3', // Rasio foto yang didukung oleh frame ini
                ...sharedConfig
            }
            // Contoh frame dengan rasio lain:
            // 'frame-v3': {
            //     id: 'frame-v3',
            //     name: 'Frame Versi 3',
            //     path: '/frames/frame-1x1-3photos.png',
            //     aspectRatio: '1:1', // Frame untuk rasio 1:1
            //     ...sharedConfig1x1
            // },
            // 'frame-v4': {
            //     id: 'frame-v4',
            //     name: 'Frame Versi 4',
            //     path: '/frames/frame-16x9-3photos.png',
            //     aspectRatio: '16:9', // Frame untuk rasio 16:9
            //     ...sharedConfig16x9
            // }
        };

        // Default frame (untuk backward compatibility)
        this.frameConfig = this.frameConfigs['frame-v1'];

        // Log initialization for debugging
        console.log('[FrameHandler] Initialized with frames:', Object.keys(this.frameConfigs).map(id => ({
            id: id,
            name: this.frameConfigs[id].name,
            path: this.frameConfigs[id].path
        })));
    }

    /**
     * Get frame configuration by ID
     * @param {string} frameId - Frame ID (e.g., 'frame-v1')
     * @returns {Object|null} Frame configuration or null if not found
     */
    getFrameConfig(frameId) {
        return this.frameConfigs[frameId] || this.frameConfig;
    }

    /**
     * Get all available frame configs for a specific aspect ratio
     * Hanya menampilkan frame yang sesuai dengan rasio foto yang dipilih
     * @param {string} aspectRatio - Aspect ratio string (e.g., '4:3', '1:1', '16:9')
     * @returns {Array} Array of frame config objects that match the aspect ratio
     */
    getAvailableFrames(aspectRatio) {
        try {
            // Filter frame configs berdasarkan aspectRatio yang sesuai
            const matchingFrames = Object.values(this.frameConfigs).filter(frame => {
                // Jika frame tidak memiliki property aspectRatio, skip (untuk backward compatibility, anggap tidak cocok)
                if (!frame.aspectRatio) {
                    console.warn(`[FrameHandler] Frame ${frame.id} (${frame.name}) tidak memiliki property aspectRatio, akan di-skip`);
                    return false;
                }
                // Bandingkan aspectRatio dengan case-insensitive
                return frame.aspectRatio.toLowerCase() === aspectRatio.toLowerCase();
            });

            if (matchingFrames.length > 0) {
                console.log(`[FrameHandler] Found ${matchingFrames.length} frame(s) for aspect ratio ${aspectRatio}:`, matchingFrames.map(f => f.name));
                return matchingFrames;
            } else {
                console.warn(`[FrameHandler] No frames configured for aspect ratio: ${aspectRatio}`);
                console.log(`[FrameHandler] Available frame aspect ratios:`, [...new Set(Object.values(this.frameConfigs).map(f => f.aspectRatio).filter(Boolean))]);
                return [];
            }
        } catch (error) {
            console.error('[FrameHandler] Error getting available frames:', error);
            // Return empty array if error occurs (lebih aman daripada return frame yang salah)
            return [];
        }
    }

    /**
     * Add frame configuration to template object
     * Hanya menambahkan frame config jika aspectRatio frame sesuai dengan aspectRatio yang diminta
     * @param {Object} template - Template object
     * @param {string} aspectRatio - Aspect ratio string (e.g., '4:3', '1:1', '16:9')
     * @param {string} frameId - Optional frame ID (default: 'frame-v1')
     */
    addFrameConfigToTemplate(template, aspectRatio, frameId = 'frame-v1') {
        const frameConfig = this.getFrameConfig(frameId);

        // Validasi bahwa frame memiliki aspectRatio yang sesuai
        if (!frameConfig) {
            console.warn(`[FrameHandler] Frame config dengan ID '${frameId}' tidak ditemukan`);
            return;
        }

        // Jika frame tidak memiliki property aspectRatio, skip (untuk backward compatibility)
        if (!frameConfig.aspectRatio) {
            console.warn(`[FrameHandler] Frame ${frameConfig.id} (${frameConfig.name}) tidak memiliki property aspectRatio, akan di-skip`);
            return;
        }

        // Validasi bahwa aspectRatio frame sesuai dengan yang diminta
        if (frameConfig.aspectRatio.toLowerCase() !== aspectRatio.toLowerCase()) {
            console.warn(`[FrameHandler] Frame ${frameConfig.id} (${frameConfig.name}) memiliki aspectRatio '${frameConfig.aspectRatio}' yang tidak sesuai dengan '${aspectRatio}'`);
            return;
        }

        // Tambahkan config ke template jika validasi berhasil
        template.frameId = frameConfig.id;
        template.frameName = frameConfig.name;
        template.framePath = frameConfig.path;
        template.frameWidth = frameConfig.width;
        template.frameHeight = frameConfig.height;
        template.photoHoles = frameConfig.photoHoles;
        template.adjustments = frameConfig.adjustments;
        template.aspectRatio = frameConfig.aspectRatio; // Simpan juga aspectRatio untuk referensi
    }

    /**
     * Generate simple template preview for card selection
     * @param {Object} template - Template object with framePath
     * @returns {string} HTML string for preview
     */
    generateSimpleTemplatePreview(template) {
        if (template.layout === 'custom-vertical' && template.framePath) {
            // Add error handling for image load failure
            const framePath = template.framePath;
            const frameName = template.frameName || 'Frame';

            return `
                <div class="relative mx-auto" style="width: 80px; height: 60px; aspect-ratio: 4/3;">
                    <img src="${framePath}"
                         alt="${frameName} Preview"
                         class="w-full h-full object-contain"
                         style="display: block;"
                         onerror="this.onerror=null; this.src='data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%2780%27 height=%2760%27%3E%3Crect fill=%27%23f3f4f6%27 width=%2780%27 height=%2760%27/%3E%3Ctext x=%2750%25%27 y=%2750%25%27 text-anchor=%27middle%27 dy=%27.3em%27 fill=%27%23999%27 font-size=%2710%27%3E${frameName}%3C/text%3E%3C/svg%3E'; console.error('Failed to load frame image: ${framePath}');">
                </div>
            `;
        }
        // Fallback if no frame path
        return `
            <div class="relative mx-auto bg-gray-100 rounded" style="width: 80px; height: 60px; aspect-ratio: 4/3;">
                <div class="flex items-center justify-center h-full text-xs text-gray-500">Template</div>
            </div>
        `;
    }

    /**
     * Generate template HTML with photos positioned in frame holes
     * @param {Object} template - Template object with framePath and photoHoles
     * @param {Array} capturedPhotos - Array of photo data URLs
     * @returns {string} HTML string for template preview
     */
    generateTemplateWithPhotos(template, capturedPhotos) {
        if (template.layout === 'custom-vertical' && template.framePath && template.photoHoles) {
            const frameWidth = template.frameWidth || this.frameConfig.width;
            const frameHeight = template.frameHeight || this.frameConfig.height;

            // Helper function to calculate percentage
            const getPercent = (value, total) => (value / total) * 100;

            // Apply adjustments if available
            const adjustments = template.adjustments || this.frameConfig.adjustments || { offsetX: 0, offsetY: 0, padding: 0 };

            const holes = template.photoHoles.map((hole, index) => {
                // Apply adjustments
                const adjustedX = hole.x + adjustments.offsetX;
                const adjustedY = hole.y + adjustments.offsetY;
                const adjustedWidth = hole.width - (adjustments.padding * 2);
                const adjustedHeight = hole.height - (adjustments.padding * 2);

                const leftPercent = getPercent(adjustedX, frameWidth);
                const topPercent = getPercent(adjustedY, frameHeight);
                const widthPercent = getPercent(adjustedWidth, frameWidth);
                const heightPercent = getPercent(adjustedHeight, frameHeight);

                return {
                    left: leftPercent,
                    top: topPercent,
                    width: widthPercent,
                    height: heightPercent
                };
            });

            return `
                <div class="w-full h-full relative overflow-hidden">
                    <!-- Frame PNG as background/base -->
                    <img src="${template.framePath}" alt="Frame" class="absolute inset-0 w-full h-full object-cover z-0" style="object-fit: cover;">
                    <!-- Photos on top of frame (will show through transparent areas) -->
                    <div class="absolute inset-0 w-full h-full z-10" style="pointer-events: none;">
                        <!-- Photo 1 -->
                        <div class="absolute overflow-hidden" style="left: ${holes[0].left.toFixed(4)}%; top: ${holes[0].top.toFixed(4)}%; width: ${holes[0].width.toFixed(4)}%; height: ${holes[0].height.toFixed(4)}%;">
                            <img src="${capturedPhotos[0]}" alt="Foto 1" class="w-full h-full" style="object-fit: cover; object-position: center;">
                        </div>
                        <!-- Photo 2 -->
                        <div class="absolute overflow-hidden" style="left: ${holes[1].left.toFixed(4)}%; top: ${holes[1].top.toFixed(4)}%; width: ${holes[1].width.toFixed(4)}%; height: ${holes[1].height.toFixed(4)}%;">
                            <img src="${capturedPhotos[1]}" alt="Foto 2" class="w-full h-full" style="object-fit: cover; object-position: center;">
                        </div>
                        <!-- Photo 3 -->
                        <div class="absolute overflow-hidden" style="left: ${holes[2].left.toFixed(4)}%; top: ${holes[2].top.toFixed(4)}%; width: ${holes[2].width.toFixed(4)}%; height: ${holes[2].height.toFixed(4)}%;">
                            <img src="${capturedPhotos[2]}" alt="Foto 3" class="w-full h-full" style="object-fit: cover; object-position: center;">
                        </div>
                    </div>
                    <!-- Frame PNG as overlay to ensure frame decorations and text are on top -->
                    <img src="${template.framePath}" alt="Frame" class="absolute inset-0 w-full h-full object-cover z-20 pointer-events-none" style="object-fit: cover;">
                </div>
            `;
        }
        return '';
    }

    /**
     * Calculate canvas dimensions based on frame PNG
     * @param {Object} template - Template object with frameWidth and frameHeight
     * @param {Function} getAspectRatioDimensions - Fallback function for aspect ratio dimensions
     * @returns {Array} [width, height] array
     */
    getCanvasDimensions(template, getAspectRatioDimensions) {
        if (template.frameWidth && template.frameHeight) {
            // Scale to maintain aspect ratio, max width 1200px for reasonable file size
            const maxWidth = 1200;
            const scale = Math.min(maxWidth / template.frameWidth, 1); // Don't scale up, only scale down if needed
            const width = Math.round(template.frameWidth * scale);
            const height = Math.round(template.frameHeight * scale);
            return [width, height];
        }
        // Fallback to aspect ratio dimensions
        return getAspectRatioDimensions();
    }

    /**
     * Draw template on canvas with frame PNG using destination-over compositing
     * This ensures photos only show through transparent areas of the frame
     * @param {CanvasRenderingContext2D} ctx - Canvas context
     * @param {Object} template - Template object with framePath and photoHoles
     * @param {number} canvasWidth - Canvas width
     * @param {number} canvasHeight - Canvas height
     * @param {Array} capturedPhotos - Array of photo data URLs
     * @param {Function} drawImageOnCanvasAsync - Function to draw image on canvas
     * @param {Function} drawImageContainOnCanvasAsync - Function to draw image with contain mode
     * @returns {Promise} Promise that resolves when drawing is complete
     */
    async drawTemplateOnCanvasAsync(ctx, template, canvasWidth, canvasHeight, capturedPhotos, drawImageOnCanvasAsync, drawImageContainOnCanvasAsync) {
        if (template.layout === 'custom-vertical' && template.framePath && template.photoHoles) {
            try {
                // Calculate scale factor to match canvas size
                const scaleX = canvasWidth / template.frameWidth;
                const scaleY = canvasHeight / template.frameHeight;

                // Method 1: Draw photos first, then frame on top (frame masks photos)
                // This works if frame PNG has transparent areas

                // Step 1: Fill background with white
                // NOTE: If photos don't show, the frame PNG might not have transparent areas at the specified coordinates
                // Enable DEBUG_MODE below to visualize transparent areas
                const DEBUG_MODE = false; // Set to true to see transparent areas (magenta background + green rectangles)
                ctx.fillStyle = DEBUG_MODE ? '#ff00ff' : '#ffffff';
                ctx.fillRect(0, 0, canvasWidth, canvasHeight);

                // Step 2: Draw all photos first (behind frame)
                const adjustments = template.adjustments || this.frameConfig.adjustments || { offsetX: 0, offsetY: 0, padding: 0 };

                // Draw debug rectangles to show where photos should be (only in debug mode)
                if (DEBUG_MODE) {
                    ctx.strokeStyle = '#00ff00';
                    ctx.lineWidth = 2;
                    for (let i = 0; i < template.photoHoles.length; i++) {
                        const hole = template.photoHoles[i];
                        const adjustedX = hole.x + adjustments.offsetX;
                        const adjustedY = hole.y + adjustments.offsetY;
                        const adjustedWidth = hole.width - (adjustments.padding * 2);
                        const adjustedHeight = hole.height - (adjustments.padding * 2);
                        const scaledX = adjustedX * scaleX;
                        const scaledY = adjustedY * scaleY;
                        const scaledWidth = adjustedWidth * scaleX;
                        const scaledHeight = adjustedHeight * scaleY;
                        const finalX = Math.round(scaledX);
                        const finalY = Math.round(scaledY);
                        const finalWidth = Math.round(scaledWidth);
                        const finalHeight = Math.round(scaledHeight);

                        // Draw green rectangle to mark hole area
                        ctx.strokeRect(finalX, finalY, finalWidth, finalHeight);
                    }
                }

                for (let i = 0; i < template.photoHoles.length && i < capturedPhotos.length; i++) {
                    const hole = template.photoHoles[i];

                    // Apply adjustments
                    const adjustedX = hole.x + adjustments.offsetX;
                    const adjustedY = hole.y + adjustments.offsetY;
                    const adjustedWidth = hole.width - (adjustments.padding * 2);
                    const adjustedHeight = hole.height - (adjustments.padding * 2);

                    // Scale adjusted hole coordinates to match canvas size
                    const scaledX = adjustedX * scaleX;
                    const scaledY = adjustedY * scaleY;
                    const scaledWidth = adjustedWidth * scaleX;
                    const scaledHeight = adjustedHeight * scaleY;

                    // Round to nearest pixel for final drawing
                    const finalX = Math.round(scaledX);
                    const finalY = Math.round(scaledY);
                    const finalWidth = Math.round(scaledWidth);
                    const finalHeight = Math.round(scaledHeight);

                    // Draw photo with cover mode to fill the hole area
                    await this.drawImageCoverOnCanvas(
                        ctx,
                        capturedPhotos[i],
                        finalX,
                        finalY,
                        finalWidth,
                        finalHeight,
                        drawImageOnCanvasAsync
                    );
                }

                // Step 3: Draw frame PNG on top (this will mask photos to only show in transparent areas)
                // Important: Frame PNG must have transparent areas (alpha channel) for photos to show through
                ctx.globalCompositeOperation = 'source-over';

                // Load frame image to verify it loads correctly
                const frameImg = new Image();
                frameImg.crossOrigin = 'anonymous';
                await new Promise((resolve, reject) => {
                    frameImg.onload = () => {
                        // Draw frame image
                        ctx.drawImage(frameImg, 0, 0, canvasWidth, canvasHeight);
                        resolve();
                    };
                    frameImg.onerror = (error) => {
                        console.error('Error loading frame PNG:', error);
                        reject(error);
                    };
                    frameImg.src = template.framePath;
                });

                // Reset composite operation
                ctx.globalCompositeOperation = 'source-over';
            } catch (error) {
                console.error('Error drawing template with frame PNG:', error);
                throw error;
            }
        }
    }

    /**
     * Get preview style for frame PNG aspect ratio
     * @param {Object} template - Template object with frameWidth and frameHeight
     * @returns {string} CSS style string for aspect ratio
     */
    getPreviewStyle(template) {
        if (template.frameWidth && template.frameHeight) {
            return `aspect-ratio: ${template.frameWidth} / ${template.frameHeight};`;
        }
        return '';
    }

    /**
     * Draw image with cover mode (fills the entire area, may crop)
     * @param {CanvasRenderingContext2D} ctx - Canvas context
     * @param {string} imageSrc - Image source URL
     * @param {number} x - X position
     * @param {number} y - Y position
     * @param {number} width - Target width
     * @param {number} height - Target height
     * @param {Function} drawImageOnCanvasAsync - Function to draw image
     * @returns {Promise} Promise that resolves when drawing is complete
     */
    async drawImageCoverOnCanvas(ctx, imageSrc, x, y, width, height, drawImageOnCanvasAsync) {
        return new Promise((resolve, reject) => {
            const img = new Image();
            img.crossOrigin = 'anonymous'; // Allow loading from same origin
            img.onload = () => {
                try {
                    // Calculate scale to cover the entire area (fill the hole completely)
                    // Use Math.max to ensure the image covers the entire hole area
                    const scaleWidth = width / img.width;
                    const scaleHeight = height / img.height;
                    const scale = Math.max(scaleWidth, scaleHeight);
                    const drawWidth = img.width * scale;
                    const drawHeight = img.height * scale;

                    // Center the image in the hole (this may cause image to extend beyond hole)
                    const dx = x + (width - drawWidth) / 2;
                    const dy = y + (height - drawHeight) / 2;

                    // Save context state
                    ctx.save();

                    // IMPORTANT: Clip to the exact hole area FIRST before drawing
                    // This ensures the image is clipped to the hole boundaries
                    ctx.beginPath();
                    ctx.rect(x, y, width, height);
                    ctx.clip();

                    // Fill the area with white first (in case of transparent areas in frame)
                    ctx.fillStyle = '#ffffff';
                    ctx.fillRect(x, y, width, height);

                    // Set composite operation
                    ctx.globalCompositeOperation = 'source-over';

                    // Draw the scaled image (will be clipped to hole area)
                    // Even though dx might be less than x, clipping will ensure only the hole area is visible
                    ctx.drawImage(img, dx, dy, drawWidth, drawHeight);

                    // Restore context (this also restores clipping)
                    ctx.restore();

                    resolve();
                } catch (error) {
                    console.error('Error in drawImageCoverOnCanvas:', error);
                    reject(error);
                }
            };
            img.onerror = (error) => {
                console.error('Error loading image:', imageSrc, error);
                reject(error);
            };
            img.src = imageSrc;
        });
    }

    /**
     * Get debug information for frame positioning
     * This helps visualize where photos should be placed
     * @param {Object} template - Template object
     * @param {number} canvasWidth - Canvas width
     * @param {number} canvasHeight - Canvas height
     * @returns {Object} Debug information
     */
    getDebugInfo(template, canvasWidth, canvasHeight) {
        if (!template.frameWidth || !template.frameHeight) {
            return null;
        }

        const scaleX = canvasWidth / template.frameWidth;
        const scaleY = canvasHeight / template.frameHeight;
        const adjustments = template.adjustments || this.frameConfig.adjustments || { offsetX: 0, offsetY: 0, padding: 0 };

        // Expected photo aspect ratio (4:3)
        const expectedPhotoRatio = 4 / 3;

        const holes = template.photoHoles.map((hole, index) => {
            const adjustedX = hole.x + adjustments.offsetX;
            const adjustedY = hole.y + adjustments.offsetY;
            const adjustedWidth = hole.width - (adjustments.padding * 2);
            const adjustedHeight = hole.height - (adjustments.padding * 2);

            // Calculate aspect ratio
            const holeAspectRatio = adjustedWidth / adjustedHeight;
            const aspectRatioDiff = Math.abs(holeAspectRatio - expectedPhotoRatio);
            const mismatchPercent = (aspectRatioDiff / expectedPhotoRatio) * 100;

            // Calculate recommended dimensions for 4:3
            const recommendedWidth1 = adjustedWidth; // Keep width
            const recommendedHeight1 = Math.round(adjustedWidth / expectedPhotoRatio);
            const recommendedWidth2 = Math.round(adjustedHeight * expectedPhotoRatio); // Keep height
            const recommendedHeight2 = adjustedHeight;

            return {
                index: index + 1,
                original: { x: hole.x, y: hole.y, width: hole.width, height: hole.height },
                adjusted: { x: adjustedX, y: adjustedY, width: adjustedWidth, height: adjustedHeight },
                aspectRatio: {
                    current: holeAspectRatio.toFixed(4),
                    expected: expectedPhotoRatio.toFixed(4),
                    mismatch: `${mismatchPercent.toFixed(2)}%`,
                    isMatch: mismatchPercent < 5
                },
                recommendations: {
                    option1: {
                        width: recommendedWidth1,
                        height: recommendedHeight1,
                        note: 'Maintain width, adjust height for 4:3'
                    },
                    option2: {
                        width: recommendedWidth2,
                        height: recommendedHeight2,
                        note: 'Maintain height, adjust width for 4:3'
                    }
                },
                canvas: {
                    x: Math.round(adjustedX * scaleX),
                    y: Math.round(adjustedY * scaleY),
                    width: Math.round(adjustedWidth * scaleX),
                    height: Math.round(adjustedHeight * scaleY)
                },
                percent: {
                    left: ((adjustedX / template.frameWidth) * 100).toFixed(2),
                    top: ((adjustedY / template.frameHeight) * 100).toFixed(2),
                    width: ((adjustedWidth / template.frameWidth) * 100).toFixed(2),
                    height: ((adjustedHeight / template.frameHeight) * 100).toFixed(2)
                }
            };
        });

        return {
            frame: {
                original: { width: template.frameWidth, height: template.frameHeight },
                canvas: { width: canvasWidth, height: canvasHeight },
                scale: { x: scaleX.toFixed(4), y: scaleY.toFixed(4) }
            },
            adjustments: adjustments,
            holes: holes,
            aspectRatioAnalysis: {
                expectedPhotoRatio: expectedPhotoRatio.toFixed(4),
                holesWithMismatch: holes.filter(h => !h.aspectRatio.isMatch).length,
                totalHoles: holes.length
            }
        };
    }
}

// Export for use in other files
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FrameHandler;
}