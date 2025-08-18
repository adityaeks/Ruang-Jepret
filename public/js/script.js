// Navbar scroll effect
window.addEventListener('scroll', function() {
    const navbar = document.getElementById('navbar');
    if (navbar && window.scrollY > 50) {
        navbar.classList.add('shadow-md');
        navbar.classList.add('bg-white/95');
    } else if (navbar) {
        navbar.classList.remove('shadow-md');
        navbar.classList.remove('bg-white/95');
    }
});

// Testimonial slider (only if elements exist)
let currentIndex = 0;
const slider = document.getElementById('testimonialSlider');
const dots = document.querySelectorAll('.dot');
const testimonialCards = document.querySelectorAll('.testimonial-card');

if (slider && dots.length > 0 && testimonialCards.length > 0) {
    function updateSlider() {
        slider.style.transform = `translateX(-${currentIndex * 100}%)`;

        // Update dots
        dots.forEach((dot, index) => {
            if (index === currentIndex) {
                dot.classList.add('active');
            } else {
                dot.classList.remove('active');
            }
        });
    }

    // Auto slide every 5 seconds
    setInterval(() => {
        currentIndex = (currentIndex + 1) % testimonialCards.length;
        updateSlider();
    }, 5000);

    // Dot click events
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            currentIndex = index;
            updateSlider();
        });
    });
}

// Counter animation
document.addEventListener('DOMContentLoaded', function() {
    const counters = document.querySelectorAll('.counter');

    counters.forEach(counter => {
        const target = counter.innerText;
        counter.innerText = '0';

        const updateCounter = () => {
            const count = +counter.innerText;
            const targetCount = +target;

            if (count < targetCount) {
                counter.innerText = Math.ceil(count + targetCount / 20);
                setTimeout(updateCounter, 30);
            } else {
                counter.innerText = target;
            }
        };

        updateCounter();
    });

    // Gallery interactions
    const galleryItems = document.querySelectorAll('.gallery-item');

    galleryItems.forEach((item, index) => {
        // Add staggered animation delay
        item.style.animationDelay = `${index * 0.1}s`;

        // Add click event for gallery items
        item.addEventListener('click', function(e) {
            if (!e.target.closest('button')) {
                // Add a subtle click effect
                this.style.transform = 'scale(0.98)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 150);
            }
        });

        // Add hover sound effect simulation (visual feedback)
        item.addEventListener('mouseenter', function() {
            this.style.transition = 'all 0.3s cubic-bezier(0.175, 0.885, 0.32, 1.275)';
        });
    });

    // Gallery button interactions
    const galleryButtons = document.querySelectorAll('.gallery-item button');

    galleryButtons.forEach(button => {
        button.addEventListener('click', function(e) {
            e.stopPropagation();

            // Add click ripple effect
            const ripple = document.createElement('div');
            ripple.style.position = 'absolute';
            ripple.style.borderRadius = '50%';
            ripple.style.background = 'rgba(255, 255, 255, 0.3)';
            ripple.style.transform = 'scale(0)';
            ripple.style.animation = 'ripple 0.6s linear';
            ripple.style.left = (e.clientX - this.offsetLeft) + 'px';
            ripple.style.top = (e.clientY - this.offsetTop) + 'px';
            ripple.style.width = ripple.style.height = '20px';

            this.appendChild(ripple);

            setTimeout(() => {
                ripple.remove();
            }, 600);
        });
    });

    // Add ripple animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);
});