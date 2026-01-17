<?php
/**
 * Template Name: Resources Page
 *
 * Resources page template showcasing blog posts, guides, and downloadable content.
 *
 * @package Fieldcraft
 */

get_header();
?>

<style>
/* Resources Page Specific Styles */
.resources-hero {
    padding: 10rem 0 5rem;
    background: linear-gradient(135deg, var(--color-neutral-100) 0%, var(--color-neutral-50) 100%);
}

.resources-hero-inner {
    display: grid;
    gap: 2rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .resources-hero-inner {
        grid-template-columns: 1fr 1fr;
    }
}

.resources-hero-label {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-primary-700);
    margin-bottom: 1rem;
}

.resources-hero h1 {
    font-size: clamp(2.25rem, 4vw, 3rem);
    line-height: 1.15;
    color: var(--color-neutral-900);
    margin-bottom: 1rem;
}

.resources-hero-text {
    font-size: 1.125rem;
    line-height: 1.7;
    color: var(--color-neutral-600);
    max-width: 480px;
}

/* Search Box */
.resources-search {
    background: white;
    border-radius: var(--radius-xl);
    padding: 2rem;
    box-shadow: 0 10px 40px rgba(0, 0, 0, 0.08);
    border: 1px solid var(--color-neutral-200);
}

.search-form {
    display: flex;
    gap: 0.75rem;
}

.search-input {
    flex: 1;
    padding: 0.875rem 1.25rem;
    font-size: 1rem;
    border: 1px solid var(--color-neutral-300);
    border-radius: var(--radius-lg);
    background: var(--color-neutral-50);
    transition: all 0.2s ease;
}

.search-input:focus {
    outline: none;
    border-color: var(--color-primary-500);
    background: white;
    box-shadow: 0 0 0 3px var(--color-primary-100);
}

.search-input::placeholder {
    color: var(--color-neutral-400);
}

.search-tags {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    margin-top: 1rem;
}

.search-tag {
    padding: 0.375rem 0.875rem;
    font-size: 0.8125rem;
    font-weight: 500;
    color: var(--color-neutral-600);
    background: var(--color-neutral-100);
    border-radius: var(--radius-full);
    cursor: pointer;
    transition: all 0.2s ease;
}

.search-tag:hover {
    background: var(--color-primary-100);
    color: var(--color-primary-700);
}

/* Featured Resource */
.featured-section {
    padding: 5rem 0;
    background: white;
}

.featured-card {
    display: grid;
    gap: 2rem;
    background: var(--color-primary-700);
    border-radius: var(--radius-2xl);
    overflow: hidden;
}

@media (min-width: 768px) {
    .featured-card {
        grid-template-columns: 1.2fr 1fr;
    }
}

.featured-image {
    aspect-ratio: 16/10;
    overflow: hidden;
}

.featured-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.featured-content {
    padding: 2rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    color: white;
}

@media (min-width: 768px) {
    .featured-content {
        padding: 3rem;
    }
}

.featured-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-accent-400);
    margin-bottom: 1rem;
}

.featured-badge svg {
    width: 1rem;
    height: 1rem;
}

.featured-content h2 {
    font-size: clamp(1.5rem, 3vw, 2rem);
    color: white;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.featured-content p {
    font-size: 1rem;
    color: rgba(255, 255, 255, 0.8);
    line-height: 1.7;
    margin-bottom: 1.5rem;
}

.featured-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.6);
}

/* Resource Categories */
.categories-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.categories-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .categories-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .categories-grid {
        grid-template-columns: repeat(4, 1fr);
    }
}

.category-card {
    background: white;
    border-radius: var(--radius-xl);
    padding: 2rem;
    text-align: center;
    border: 1px solid var(--color-neutral-200);
    transition: all 0.3s ease;
    cursor: pointer;
}

.category-card:hover {
    border-color: var(--color-primary-300);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
    transform: translateY(-4px);
}

.category-icon {
    width: 4rem;
    height: 4rem;
    margin: 0 auto 1.25rem;
    background: var(--color-primary-100);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
    transition: all 0.3s ease;
}

.category-card:hover .category-icon {
    background: var(--color-primary-700);
    color: white;
}

.category-icon svg {
    width: 1.75rem;
    height: 1.75rem;
}

.category-card h3 {
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.5rem;
}

.category-card p {
    font-size: 0.875rem;
    color: var(--color-neutral-500);
}

.category-count {
    display: inline-block;
    margin-top: 1rem;
    padding: 0.25rem 0.75rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: var(--color-primary-700);
    background: var(--color-primary-100);
    border-radius: var(--radius-full);
}

/* Latest Articles */
.articles-section {
    padding: 5rem 0;
    background: white;
}

.articles-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 2rem;
}

.articles-grid {
    display: grid;
    gap: 2rem;
}

@media (min-width: 768px) {
    .articles-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .articles-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.article-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-neutral-200);
    transition: all 0.3s ease;
}

.article-card:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
    transform: translateY(-4px);
}

.article-image {
    aspect-ratio: 16/10;
    overflow: hidden;
    background: var(--color-neutral-100);
}

.article-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.article-card:hover .article-image img {
    transform: scale(1.05);
}

.article-content {
    padding: 1.5rem;
}

.article-category {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--color-primary-700);
    margin-bottom: 0.75rem;
}

.article-card h3 {
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.75rem;
    line-height: 1.3;
}

.article-card p {
    font-size: 0.9rem;
    color: var(--color-neutral-600);
    line-height: 1.6;
    margin-bottom: 1rem;
}

.article-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.8125rem;
    color: var(--color-neutral-500);
}

.article-meta span {
    display: flex;
    align-items: center;
    gap: 0.375rem;
}

.article-meta svg {
    width: 0.875rem;
    height: 0.875rem;
}

/* Downloads Section */
.downloads-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.downloads-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .downloads-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.download-card {
    display: flex;
    gap: 1.5rem;
    background: white;
    border-radius: var(--radius-xl);
    padding: 1.5rem;
    border: 1px solid var(--color-neutral-200);
    transition: all 0.3s ease;
}

.download-card:hover {
    border-color: var(--color-primary-300);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
}

.download-icon {
    width: 3.5rem;
    height: 3.5rem;
    background: var(--color-accent-100);
    border-radius: var(--radius-lg);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-accent-600);
    flex-shrink: 0;
}

.download-icon svg {
    width: 1.5rem;
    height: 1.5rem;
}

.download-content {
    flex: 1;
}

.download-content h3 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.375rem;
}

.download-content p {
    font-size: 0.875rem;
    color: var(--color-neutral-600);
    line-height: 1.5;
    margin-bottom: 0.75rem;
}

.download-meta {
    display: flex;
    align-items: center;
    gap: 1rem;
    font-size: 0.75rem;
    color: var(--color-neutral-500);
}

.download-meta span {
    display: flex;
    align-items: center;
    gap: 0.25rem;
}

/* Newsletter Section */
.newsletter-section {
    padding: 5rem 0;
    background: var(--color-primary-800);
    position: relative;
    overflow: hidden;
}

.newsletter-section::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.03) 1px, transparent 1px);
    background-size: 30px 30px;
    pointer-events: none;
}

.newsletter-inner {
    display: grid;
    gap: 2rem;
    align-items: center;
    position: relative;
}

@media (min-width: 768px) {
    .newsletter-inner {
        grid-template-columns: 1fr 1fr;
    }
}

.newsletter-content h2 {
    font-size: clamp(1.75rem, 3vw, 2.25rem);
    color: white;
    margin-bottom: 1rem;
}

.newsletter-content p {
    font-size: 1.0625rem;
    color: rgba(255, 255, 255, 0.7);
    line-height: 1.7;
}

.newsletter-form {
    display: flex;
    gap: 0.75rem;
    flex-wrap: wrap;
}

.newsletter-input {
    flex: 1;
    min-width: 200px;
    padding: 1rem 1.25rem;
    font-size: 1rem;
    border: 1px solid rgba(255, 255, 255, 0.2);
    border-radius: var(--radius-lg);
    background: rgba(255, 255, 255, 0.1);
    color: white;
    transition: all 0.2s ease;
}

.newsletter-input::placeholder {
    color: rgba(255, 255, 255, 0.5);
}

.newsletter-input:focus {
    outline: none;
    border-color: var(--color-accent-400);
    background: rgba(255, 255, 255, 0.15);
}

.newsletter-form .btn {
    flex-shrink: 0;
}

.newsletter-note {
    margin-top: 1rem;
    font-size: 0.8125rem;
    color: rgba(255, 255, 255, 0.5);
}

/* Video Section */
.video-section {
    padding: 5rem 0;
    background: white;
}

.video-grid {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .video-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .video-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.video-card {
    background: white;
    border-radius: var(--radius-xl);
    overflow: hidden;
    border: 1px solid var(--color-neutral-200);
    transition: all 0.3s ease;
}

.video-card:hover {
    box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1);
}

.video-thumbnail {
    position: relative;
    aspect-ratio: 16/9;
    background: var(--color-neutral-900);
    overflow: hidden;
}

.video-thumbnail img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.8;
}

.video-play {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 4rem;
    height: 4rem;
    background: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    transition: all 0.3s ease;
}

.video-card:hover .video-play {
    transform: translate(-50%, -50%) scale(1.1);
}

.video-play svg {
    width: 1.5rem;
    height: 1.5rem;
    margin-left: 0.25rem;
}

.video-duration {
    position: absolute;
    bottom: 0.75rem;
    right: 0.75rem;
    padding: 0.25rem 0.5rem;
    font-size: 0.75rem;
    font-weight: 600;
    color: white;
    background: rgba(0, 0, 0, 0.7);
    border-radius: var(--radius-sm);
}

.video-content {
    padding: 1.25rem;
}

.video-card h3 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.5rem;
    line-height: 1.3;
}

.video-card p {
    font-size: 0.875rem;
    color: var(--color-neutral-600);
    line-height: 1.5;
}
</style>

<!-- Hero Section -->
<section class="resources-hero">
    <div class="container">
        <div class="resources-hero-inner">
            <div class="reveal">
                <span class="resources-hero-label">Resources</span>
                <h1>Learn, grow, and succeed with Fieldcraft</h1>
                <p class="resources-hero-text">
                    Explore our collection of guides, tutorials, and insights to help you get the most out of your business.
                </p>
            </div>
            <div class="resources-search reveal reveal-delay-1">
                <form class="search-form" action="<?php echo esc_url(home_url('/')); ?>" method="get">
                    <input type="text" name="s" class="search-input" placeholder="Search resources...">
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
                <div class="search-tags">
                    <span class="search-tag">Getting Started</span>
                    <span class="search-tag">Automation</span>
                    <span class="search-tag">Analytics</span>
                    <span class="search-tag">Integrations</span>
                    <span class="search-tag">Best Practices</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Featured Resource -->
<section class="featured-section">
    <div class="container">
        <div class="featured-card reveal">
            <div class="featured-image">
                <img src="https://images.unsplash.com/photo-1553028826-f4804a6dba3b?w=800&h=500&fit=crop" alt="Ultimate Guide to Business Automation">
            </div>
            <div class="featured-content">
                <span class="featured-badge">
                    <?php echo fieldcraft_icon("star"); ?>
                    Featured Guide
                </span>
                <h2>The Ultimate Guide to Business Automation in 2024</h2>
                <p>
                    Learn how to streamline your operations, reduce manual work, and scale your business with our comprehensive automation playbook.
                </p>
                <a href="#" class="btn btn-accent">
                    Read the Guide <?php echo fieldcraft_icon("arrow-right"); ?>
                </a>
                <div class="featured-meta">
                    <span>45 min read</span>
                    <span>Updated Jan 2024</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Resource Categories -->
<section class="categories-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">Browse by category</h2>
        </div>

        <div class="categories-grid">
            <div class="category-card reveal">
                <div class="category-icon">
                    <?php echo fieldcraft_icon("star"); ?>
                </div>
                <h3>Getting Started</h3>
                <p>New to Fieldcraft? Start here.</p>
                <span class="category-count">12 articles</span>
            </div>

            <div class="category-card reveal reveal-delay-1">
                <div class="category-icon">
                    <?php echo fieldcraft_icon("settings"); ?>
                </div>
                <h3>Automation</h3>
                <p>Workflows, triggers, and templates.</p>
                <span class="category-count">24 articles</span>
            </div>

            <div class="category-card reveal reveal-delay-2">
                <div class="category-icon">
                    <?php echo fieldcraft_icon("chart"); ?>
                </div>
                <h3>Analytics</h3>
                <p>Reports, dashboards, and insights.</p>
                <span class="category-count">18 articles</span>
            </div>

            <div class="category-card reveal reveal-delay-3">
                <div class="category-icon">
                    <?php echo fieldcraft_icon("code"); ?>
                </div>
                <h3>Developers</h3>
                <p>API docs and integrations.</p>
                <span class="category-count">32 articles</span>
            </div>
        </div>
    </div>
</section>

<!-- Latest Articles -->
<section class="articles-section">
    <div class="container">
        <div class="articles-header reveal">
            <h2 class="text-display">Latest articles</h2>
            <a href="#" class="btn btn-outline">View All <?php echo fieldcraft_icon("arrow-right"); ?></a>
        </div>

        <div class="articles-grid">
            <article class="article-card reveal">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Productivity</span>
                    <h3>10 Ways to Boost Your Team's Productivity</h3>
                    <p>Discover proven strategies to help your team work smarter and achieve more.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 8 min read</span>
                        <span>Jan 12, 2024</span>
                    </div>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-1">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Analytics</span>
                    <h3>Understanding Your Dashboard Metrics</h3>
                    <p>A deep dive into the key metrics that matter for your business growth.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 12 min read</span>
                        <span>Jan 10, 2024</span>
                    </div>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-2">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Collaboration</span>
                    <h3>Remote Team Best Practices for 2024</h3>
                    <p>How to keep your distributed team connected and productive.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 6 min read</span>
                        <span>Jan 8, 2024</span>
                    </div>
                </div>
            </article>

            <article class="article-card reveal">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1504868584819-f8e8b4b6d7e3?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Integrations</span>
                    <h3>Connecting Fieldcraft with Your CRM</h3>
                    <p>Step-by-step guide to integrating with Salesforce, HubSpot, and more.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 10 min read</span>
                        <span>Jan 5, 2024</span>
                    </div>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-1">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Automation</span>
                    <h3>Building Your First Workflow</h3>
                    <p>A beginner's guide to creating automated workflows that save time.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 15 min read</span>
                        <span>Jan 3, 2024</span>
                    </div>
                </div>
            </article>

            <article class="article-card reveal reveal-delay-2">
                <div class="article-image">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?w=500&h=300&fit=crop" alt="Article thumbnail">
                </div>
                <div class="article-content">
                    <span class="article-category">Strategy</span>
                    <h3>Scaling Your Business with Data</h3>
                    <p>How to use analytics to make smarter growth decisions.</p>
                    <div class="article-meta">
                        <span><?php echo fieldcraft_icon("clock", 14); ?> 9 min read</span>
                        <span>Dec 28, 2023</span>
                    </div>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Downloads Section -->
<section class="downloads-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">Free downloads</h2>
            <p style="font-size: 1.125rem; color: var(--color-neutral-600); max-width: 500px; margin: 1rem auto 0;">
                Templates, checklists, and guides to accelerate your success.
            </p>
        </div>

        <div class="downloads-grid">
            <div class="download-card reveal">
                <div class="download-icon">
                    <?php echo fieldcraft_icon("chart"); ?>
                </div>
                <div class="download-content">
                    <h3>Business Analytics Template</h3>
                    <p>Track your KPIs with our pre-built analytics dashboard template.</p>
                    <div class="download-meta">
                        <span>PDF</span>
                        <span>2.4 MB</span>
                    </div>
                </div>
            </div>

            <div class="download-card reveal reveal-delay-1">
                <div class="download-icon">
                    <?php echo fieldcraft_icon("settings"); ?>
                </div>
                <div class="download-content">
                    <h3>Automation Workflow Checklist</h3>
                    <p>Step-by-step checklist for building effective automated workflows.</p>
                    <div class="download-meta">
                        <span>PDF</span>
                        <span>1.1 MB</span>
                    </div>
                </div>
            </div>

            <div class="download-card reveal">
                <div class="download-icon">
                    <?php echo fieldcraft_icon("users"); ?>
                </div>
                <div class="download-content">
                    <h3>Team Onboarding Guide</h3>
                    <p>Everything you need to get your team up and running quickly.</p>
                    <div class="download-meta">
                        <span>PDF</span>
                        <span>3.8 MB</span>
                    </div>
                </div>
            </div>

            <div class="download-card reveal reveal-delay-1">
                <div class="download-icon">
                    <?php echo fieldcraft_icon("lightning"); ?>
                </div>
                <div class="download-content">
                    <h3>Productivity Playbook</h3>
                    <p>50+ tips and tricks to maximize your productivity with Fieldcraft.</p>
                    <div class="download-meta">
                        <span>PDF</span>
                        <span>5.2 MB</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Video Tutorials -->
<section class="video-section">
    <div class="container">
        <div class="articles-header reveal">
            <h2 class="text-display">Video tutorials</h2>
            <a href="#" class="btn btn-outline">View All <?php echo fieldcraft_icon("arrow-right"); ?></a>
        </div>

        <div class="video-grid">
            <div class="video-card reveal">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1611162617474-5b21e879e113?w=500&h=280&fit=crop" alt="Video thumbnail">
                    <div class="video-play">
                        <?php echo fieldcraft_icon("arrow-right"); ?>
                    </div>
                    <span class="video-duration">12:34</span>
                </div>
                <div class="video-content">
                    <h3>Getting Started with Fieldcraft</h3>
                    <p>A complete walkthrough for new users.</p>
                </div>
            </div>

            <div class="video-card reveal reveal-delay-1">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1551434678-e076c223a692?w=500&h=280&fit=crop" alt="Video thumbnail">
                    <div class="video-play">
                        <?php echo fieldcraft_icon("arrow-right"); ?>
                    </div>
                    <span class="video-duration">8:45</span>
                </div>
                <div class="video-content">
                    <h3>Setting Up Your First Dashboard</h3>
                    <p>Customize your workspace in minutes.</p>
                </div>
            </div>

            <div class="video-card reveal reveal-delay-2">
                <div class="video-thumbnail">
                    <img src="https://images.unsplash.com/photo-1531482615713-2afd69097998?w=500&h=280&fit=crop" alt="Video thumbnail">
                    <div class="video-play">
                        <?php echo fieldcraft_icon("arrow-right"); ?>
                    </div>
                    <span class="video-duration">15:20</span>
                </div>
                <div class="video-content">
                    <h3>Advanced Automation Techniques</h3>
                    <p>Take your workflows to the next level.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Newsletter Section -->
<section class="newsletter-section">
    <div class="container">
        <div class="newsletter-inner">
            <div class="newsletter-content reveal">
                <h2>Stay in the loop</h2>
                <p>Get the latest tips, tutorials, and product updates delivered straight to your inbox. No spam, ever.</p>
            </div>
            <div class="reveal reveal-delay-1">
                <form class="newsletter-form">
                    <input type="email" class="newsletter-input" placeholder="Enter your email">
                    <button type="submit" class="btn btn-accent">Subscribe</button>
                </form>
                <p class="newsletter-note">Join 10,000+ subscribers. Unsubscribe anytime.</p>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>
