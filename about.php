<?php
/**
 * Template Name: About Page
 *
 * About page template with unique layout and content.
 *
 * @package Fieldcraft
 */

get_header(); ?>

<style>
/* About Page Specific Styles */
.about-hero {
    padding: 10rem 0 4rem;
    background: var(--color-primary-800);
    color: white;
    position: relative;
    overflow: hidden;
}

.about-hero::before {
    content: "";
    position: absolute;
    top: -50%;
    right: -20%;
    width: 80%;
    height: 200%;
    background: radial-gradient(ellipse, rgba(139, 92, 246, 0.3) 0%, transparent 60%);
    pointer-events: none;
}

.about-hero-inner {
    display: grid;
    gap: 3rem;
    align-items: center;
}

@media (min-width: 1024px) {
    .about-hero-inner {
        grid-template-columns: 1.2fr 1fr;
    }
}

.about-hero-content {
    position: relative;
    z-index: 1;
}

.about-hero-label {
    display: inline-block;
    font-size: 0.75rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.1em;
    color: var(--color-accent-400);
    margin-bottom: 1rem;
}

.about-hero h1 {
    font-size: clamp(2.5rem, 5vw, 3.5rem);
    line-height: 1.1;
    color: white;
    margin-bottom: 1.5rem;
}

.about-hero-text {
    font-size: 1.125rem;
    line-height: 1.8;
    color: rgba(255, 255, 255, 0.8);
    max-width: 500px;
}

.about-hero-image {
    position: relative;
    z-index: 1;
    display: none;
}

@media (min-width: 1024px) {
    .about-hero-image {
        display: block;
    }
}

.about-hero-image img {
    width: 100%;
    border-radius: var(--radius-2xl);
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
}

/* Timeline Section */
.timeline-section {
    padding: 5rem 0;
    background: white;
}

.timeline {
    position: relative;
    max-width: 800px;
    margin: 3rem auto 0;
}

.timeline::before {
    content: "";
    position: absolute;
    left: 0;
    top: 0;
    bottom: 0;
    width: 2px;
    background: var(--color-neutral-200);
}

@media (min-width: 768px) {
    .timeline::before {
        left: 50%;
        transform: translateX(-50%);
    }
}

.timeline-item {
    position: relative;
    padding-left: 2.5rem;
    padding-bottom: 3rem;
}

@media (min-width: 768px) {
    .timeline-item {
        width: 50%;
        padding-left: 0;
        padding-right: 3rem;
    }

    .timeline-item:nth-child(even) {
        margin-left: 50%;
        padding-left: 3rem;
        padding-right: 0;
    }
}

.timeline-item::before {
    content: "";
    position: absolute;
    left: -5px;
    top: 0;
    width: 12px;
    height: 12px;
    background: var(--color-primary-700);
    border-radius: 50%;
    border: 3px solid white;
    box-shadow: 0 0 0 2px var(--color-primary-200);
}

@media (min-width: 768px) {
    .timeline-item::before {
        left: auto;
        right: -6px;
    }

    .timeline-item:nth-child(even)::before {
        right: auto;
        left: -6px;
    }
}

.timeline-year {
    font-family: var(--font-display);
    font-size: 0.875rem;
    font-weight: 700;
    color: var(--color-accent-500);
    margin-bottom: 0.5rem;
}

.timeline-title {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.5rem;
}

.timeline-text {
    font-size: 0.95rem;
    color: var(--color-neutral-600);
    line-height: 1.7;
}

/* Approach Section */
.approach-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.approach-grid {
    display: grid;
    gap: 2rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .approach-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}

.approach-card {
    background: white;
    border-radius: var(--radius-2xl);
    padding: 2.5rem;
    position: relative;
    overflow: hidden;
    border: 1px solid var(--color-neutral-200);
}

.approach-card::before {
    content: attr(data-number);
    position: absolute;
    top: 1.5rem;
    right: 1.5rem;
    font-family: var(--font-display);
    font-size: 4rem;
    font-weight: 700;
    color: var(--color-neutral-100);
    line-height: 1;
}

.approach-card h3 {
    font-family: var(--font-display);
    font-size: 1.25rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 1rem;
    position: relative;
}

.approach-card p {
    font-size: 0.95rem;
    color: var(--color-neutral-600);
    line-height: 1.7;
    position: relative;
}

/* Beliefs Section */
.beliefs-section {
    padding: 5rem 0;
    background: white;
}

.beliefs-grid {
    display: grid;
    gap: 1px;
    background: var(--color-neutral-200);
    border: 1px solid var(--color-neutral-200);
    border-radius: var(--radius-2xl);
    overflow: hidden;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .beliefs-grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

.belief-item {
    background: white;
    padding: 2.5rem;
    text-align: center;
}

.belief-icon {
    width: 3.5rem;
    height: 3.5rem;
    margin: 0 auto 1.25rem;
    background: var(--color-primary-100);
    border-radius: var(--radius-xl);
    display: flex;
    align-items: center;
    justify-content: center;
    color: var(--color-primary-700);
}

.belief-icon svg {
    width: 1.5rem;
    height: 1.5rem;
}

.belief-item h4 {
    font-family: var(--font-display);
    font-size: 1rem;
    font-weight: 700;
    color: var(--color-neutral-900);
    margin-bottom: 0.75rem;
}

.belief-item p {
    font-size: 0.875rem;
    color: var(--color-neutral-500);
    line-height: 1.6;
}

/* Team Section - Different Layout */
.about-team-section {
    padding: 5rem 0;
    background: var(--color-neutral-50);
}

.team-intro {
    max-width: 600px;
}

.team-intro p {
    font-size: 1.125rem;
    color: var(--color-neutral-600);
    line-height: 1.8;
    margin-top: 1rem;
}

.team-showcase {
    display: grid;
    gap: 1.5rem;
    margin-top: 3rem;
}

@media (min-width: 768px) {
    .team-showcase {
        grid-template-columns: repeat(2, 1fr);
    }
}

@media (min-width: 1024px) {
    .team-showcase {
        grid-template-columns: repeat(4, 1fr);
    }
}

.team-member {
    position: relative;
    border-radius: var(--radius-2xl);
    overflow: hidden;
    aspect-ratio: 3/4;
    background: var(--color-neutral-200);
}

.team-member img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}

.team-member:hover img {
    transform: scale(1.05);
}

.team-member-info {
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    padding: 1.5rem;
    background: linear-gradient(to top, rgba(0,0,0,0.8) 0%, transparent 100%);
    color: white;
}

.team-member-info h4 {
    font-family: var(--font-display);
    font-size: 1.125rem;
    font-weight: 600;
    color: white;
    margin-bottom: 0.25rem;
}

.team-member-info span {
    font-size: 0.875rem;
    color: rgba(255, 255, 255, 0.7);
}

/* Contact CTA */
.contact-cta {
    padding: 5rem 0;
    background: white;
}

.contact-cta-inner {
    background: var(--color-primary-700);
    border-radius: var(--radius-2xl);
    padding: 4rem 2rem;
    text-align: center;
    position: relative;
    overflow: hidden;
}

.contact-cta-inner::before {
    content: "";
    position: absolute;
    inset: 0;
    background-image: radial-gradient(rgba(255,255,255,0.1) 1px, transparent 1px);
    background-size: 20px 20px;
    pointer-events: none;
}

.contact-cta h2 {
    font-size: clamp(1.75rem, 4vw, 2.5rem);
    color: white;
    margin-bottom: 1rem;
    position: relative;
}

.contact-cta p {
    color: rgba(255, 255, 255, 0.8);
    font-size: 1.125rem;
    max-width: 500px;
    margin: 0 auto 2rem;
    position: relative;
}

.contact-cta .btn {
    position: relative;
}
</style>

<!-- Hero Section -->
<section class="about-hero">
    <div class="container">
        <div class="about-hero-inner">
            <div class="about-hero-content reveal">
                <span class="about-hero-label">About Fieldcraft</span>
                <h1>We help businesses unlock their digital potential</h1>
                <p class="about-hero-text">
                    Since 2018, we've partnered with ambitious companies to build digital products that matter. Our approach combines strategic thinking with technical excellence to deliver lasting results.
                </p>
            </div>
            <div class="about-hero-image reveal reveal-delay-1">
                <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?w=600&h=450&fit=crop" alt="Fieldcraft team collaborating">
            </div>
        </div>
    </div>
</section>

<!-- Timeline Section -->
<section class="timeline-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">Our Journey</h2>
        </div>

        <div class="timeline">
            <div class="timeline-item reveal">
                <div class="timeline-year">2018</div>
                <div class="timeline-title">The Beginning</div>
                <p class="timeline-text">Founded in a small co-working space with a vision to make enterprise-grade tools accessible to businesses of all sizes.</p>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-year">2019</div>
                <div class="timeline-title">First Major Client</div>
                <p class="timeline-text">Secured our first Fortune 500 partnership, proving our approach worked at scale.</p>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-year">2021</div>
                <div class="timeline-title">Global Expansion</div>
                <p class="timeline-text">Opened offices in London and Singapore, growing our team to over 50 specialists.</p>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-year">2023</div>
                <div class="timeline-title">10,000 Users</div>
                <p class="timeline-text">Reached a milestone of 10,000 active users across 50+ countries worldwide.</p>
            </div>

            <div class="timeline-item reveal">
                <div class="timeline-year">Today</div>
                <div class="timeline-title">Continuing to Grow</div>
                <p class="timeline-text">Building the next generation of business tools while staying true to our founding mission.</p>
            </div>
        </div>
    </div>
</section>

<!-- Approach Section -->
<section class="approach-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">How We Work</h2>
        </div>

        <div class="approach-grid">
            <div class="approach-card reveal" data-number="01">
                <h3>Discover</h3>
                <p>We start by deeply understanding your business, challenges, and goals. No assumptions, just listening and learning.</p>
            </div>

            <div class="approach-card reveal reveal-delay-1" data-number="02">
                <h3>Strategize</h3>
                <p>Together, we map out a clear path forward. Every decision is grounded in data and aligned with your objectives.</p>
            </div>

            <div class="approach-card reveal" data-number="03">
                <h3>Build</h3>
                <p>Our team brings ideas to life with precision and care. We iterate quickly, keeping you involved every step of the way.</p>
            </div>

            <div class="approach-card reveal reveal-delay-1" data-number="04">
                <h3>Evolve</h3>
                <p>Launch is just the beginning. We measure, learn, and continuously improve to maximize long-term value.</p>
            </div>
        </div>
    </div>
</section>

<!-- Beliefs Section -->
<section class="beliefs-section">
    <div class="container">
        <div class="section-header reveal">
            <h2 class="text-display">What We Believe</h2>
        </div>

        <div class="beliefs-grid reveal">
            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("star"); ?>
                </div>
                <h4>Simplicity Wins</h4>
                <p>The best solutions are often the simplest. We cut through complexity to deliver clarity.</p>
            </div>

            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("users"); ?>
                </div>
                <h4>People First</h4>
                <p>Technology serves people, not the other way around. We design for humans.</p>
            </div>

            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("lightning"); ?>
                </div>
                <h4>Move Fast</h4>
                <p>Speed matters. We ship early and often, learning from real-world feedback.</p>
            </div>

            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("chart"); ?>
                </div>
                <h4>Measure Everything</h4>
                <p>Gut feelings are great, but data is better. We let numbers guide our decisions.</p>
            </div>

            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("globe"); ?>
                </div>
                <h4>Think Global</h4>
                <p>We build for a connected world, embracing diverse perspectives and markets.</p>
            </div>

            <div class="belief-item">
                <div class="belief-icon">
                    <?php echo fieldcraft_icon("settings"); ?>
                </div>
                <h4>Never Settle</h4>
                <p>Good enough isn't good enough. We push for excellence in everything we do.</p>
            </div>
        </div>
    </div>
</section>

<!-- Team Section -->
<section class="about-team-section">
    <div class="container">
        <div class="team-intro reveal">
            <h2 class="text-display">The People Behind Fieldcraft</h2>
            <p>We're a diverse team of strategists, designers, and engineers united by a shared passion for building great products.</p>
        </div>

        <div class="team-showcase">
            <div class="team-member reveal">
                <img src="https://res.cloudinary.com/swdb/image/upload/v1768575604/A_digital_headshot_features_a_young_Caucasian_blon_354x472_natural_fkripi.png" alt="Sarah Johnson">
                <div class="team-member-info">
                    <h4>Sarah Johnson</h4>
                    <span>CEO & Founder</span>
                </div>
            </div>

            <div class="team-member reveal reveal-delay-1">
                <img src="https://res.cloudinary.com/swdb/image/upload/v1768575624/A_digital_photograph_features_a_close-up_portrait__354x472_natural_s2wd4j.png" alt="Michael Chen">
                <div class="team-member-info">
                    <h4>Michael Chen</h4>
                    <span>Lead Developer</span>
                </div>
            </div>

            <div class="team-member reveal reveal-delay-2">
                <img src="https://res.cloudinary.com/swdb/image/upload/v1768575602/A_digital_photograph_features_a_headshot_of_a_bear_354x472_natural_ukqkb6.png" alt="Eric Davis">
                <div class="team-member-info">
                    <h4>Eric Davis</h4>
                    <span>Design Director</span>
                </div>
            </div>

            <div class="team-member reveal reveal-delay-3">
                <img src="https://res.cloudinary.com/swdb/image/upload/v1768578103/black_male_business_casual_354x472_o3s1ck.png" alt="James Wilson">
                <div class="team-member-info">
                    <h4>James Wilson</h4>
                    <span>Project Manager</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="contact-cta">
    <div class="container">
        <div class="contact-cta-inner reveal">
            <h2>Let's build something great together</h2>
            <p>Ready to transform your business? We'd love to hear about your project.</p>
            <a href="<?php echo esc_url(
                home_url("/contact"),
            ); ?>" class="btn btn-accent btn-lg">
                Start a Conversation <?php echo fieldcraft_icon(
                    "arrow-right",
                ); ?>
            </a>
        </div>
    </div>
</section>

<?php get_footer(); ?>
