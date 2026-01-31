// Data akan di-inject dari Blade sebagai window variables
// Lihat di index.blade.php bagian <script>

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', function () {
    populateGallery();
    populateNews();
    initializeEventListeners();
    initializeNavigation();
});

// Initialize Navigation
function initializeNavigation() {
    const menuToggle = document.getElementById('menuToggle');
    const navMenu = document.getElementById('navMenu');
    const navOverlay = document.getElementById('navOverlay');
    const navLinks = document.querySelectorAll('.nav-link');

    // Mobile menu toggle
    if (menuToggle) {
        menuToggle.addEventListener('click', function () {
            menuToggle.classList.toggle('active');
            navMenu.classList.toggle('active');
            navOverlay.classList.toggle('active');
            document.body.style.overflow = navMenu.classList.contains('active') ? 'hidden' : 'auto';
        });
    }

    // Close menu when overlay is clicked
    if (navOverlay) {
        navOverlay.addEventListener('click', function () {
            menuToggle.classList.remove('active');
            navMenu.classList.remove('active');
            navOverlay.classList.remove('active');
            document.body.style.overflow = 'auto';
        });
    }

    // Close menu when nav link is clicked (mobile)
    navLinks.forEach(link => {
        link.addEventListener('click', function () {
            if (window.innerWidth <= 768) {
                menuToggle.classList.remove('active');
                navMenu.classList.remove('active');
                navOverlay.classList.remove('active');
                document.body.style.overflow = 'auto';
            }
        });
    });

    // Active link on scroll
    window.addEventListener('scroll', function () {
        let current = '';
        const sections = document.querySelectorAll('section, footer');

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.clientHeight;
            if (window.pageYOffset >= (sectionTop - 200)) {
                current = section.getAttribute('id');
            }
        });

        navLinks.forEach(link => {
            link.classList.remove('active');
            if (link.getAttribute('href').substring(1) === current) {
                link.classList.add('active');
            }
        });
    });

    // Smooth scroll with offset for fixed header
    navLinks.forEach(link => {
        link.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href').substring(1);
            const targetSection = document.getElementById(targetId);

            if (targetSection) {
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = targetSection.offsetTop - headerHeight;

                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });
}

// Populate gallery grid - Menggunakan data dari window.collections
function populateGallery() {
    const galleryGrid = document.getElementById('galleryGrid');
    if (!galleryGrid) return;

    // Data collections dari Blade (window.collections)
    const collections = window.collections || [];

    collections.forEach((item, index) => {
        const galleryItem = document.createElement('div');
        galleryItem.className = 'gallery-item';
        galleryItem.onclick = () => openModal(index);

        galleryItem.innerHTML = `
            <div class="item-image">
                <img src="${item.image}" alt="${item.title}">
            </div>
            <div class="item-content">
                <h3 class="item-title">${item.title}</h3>
                <p class="item-short-desc">${item.short_desc}</p>
                <a href="#" class="read-more" onclick="event.preventDefault(); openModal(${index})">Baca Selengkapnya</a>
            </div>
        `;

        galleryGrid.appendChild(galleryItem);
    });
}

// Populate news grid - Menggunakan data dari window.newsData
function populateNews() {
    const newsGrid = document.getElementById('newsGrid');
    if (!newsGrid) return;

    // Data news dari Blade (window.newsData)
    const newsData = window.newsData || [];

    newsData.forEach((news, index) => {
        const newsItem = document.createElement('div');
        newsItem.className = 'news-item';
        newsItem.onclick = () => openNewsModal(index);

        newsItem.innerHTML = `
            <div class="news-image">
                <div class="news-date">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect>
                        <line x1="16" y1="2" x2="16" y2="6"></line>
                        <line x1="8" y1="2" x2="8" y2="6"></line>
                        <line x1="3" y1="10" x2="21" y2="10"></line>
                    </svg>
                    ${news.date}
                </div>
                ${news.image ? `<img src="${news.image}" alt="${news.title}">` : `<div class="news-placeholder">📰</div>`}
            </div>
            <div class="news-content">
                <span class="news-category">${news.category}</span>
                <h3 class="news-title">${news.title}</h3>
                <p class="news-description">${news.short_desc}</p>
                <div class="news-footer">
                    <div class="news-author">
                        <div class="news-author-avatar">${news.author.charAt(0)}</div>
                        <span>${news.author}</span>
                    </div>
                    <a href="#" class="news-read-more" onclick="event.preventDefault(); openNewsModal(${index})">Baca</a>
                </div>
            </div>
        `;

        newsGrid.appendChild(newsItem);
    });
}

// Modal functions for collections
// Modal functions for collections - WITH IMAGE SUPPORT
function openModal(index) {
    const collections = window.collections || [];
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalImage = document.getElementById('modalImage');

    // Set content
    modalTitle.textContent = collections[index].title;
    modalDescription.innerHTML = collections[index].description;

    // Set image
    if (modalImage && collections[index].image) {
        modalImage.src = collections[index].image;
        modalImage.alt = collections[index].title;
    }

    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Modal function for news - WITH IMAGE SUPPORT
function openNewsModal(index) {
    const newsData = window.newsData || [];
    const modal = document.getElementById('modal');
    const modalTitle = document.getElementById('modalTitle');
    const modalDescription = document.getElementById('modalDescription');
    const modalImage = document.getElementById('modalImage');

    // Set content
    modalTitle.textContent = newsData[index].title;
    modalDescription.innerHTML = newsData[index].content;

    // Set image
    if (modalImage && newsData[index].image) {
        modalImage.src = newsData[index].image;
        modalImage.alt = newsData[index].title;
    }

    // Show modal
    modal.classList.add('active');
    document.body.style.overflow = 'hidden';
}

// Close modal
function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Close modal
function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.remove('active');
    document.body.style.overflow = 'auto';
}

// Initialize event listeners
function initializeEventListeners() {
    // Close modal on outside click
    const modal = document.getElementById('modal');
    if (modal) {
        modal.addEventListener('click', function (e) {
            if (e.target === this) {
                closeModal();
            }
        });
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function (e) {
        if (e.key === 'Escape') {
            closeModal();
        }
    });

    // Smooth scroll indicator
    const scrollIndicator = document.querySelector('.scroll-indicator');
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', function () {
            const gallerySection = document.querySelector('.gallery-section');
            if (gallerySection) {
                gallerySection.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        });
    }

    // Parallax effect for hero
    window.addEventListener('scroll', function () {
        const scrolled = window.pageYOffset;
        const hero = document.querySelector('.hero-background img');
        if (hero) {
            hero.style.transform = `translateY(${scrolled * 0.5}px)`;
        }
    });
}