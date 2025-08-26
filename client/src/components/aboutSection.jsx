function AboutSection() {
  return (
    <section
      id="about"
      className="relative bg-gradient-to-b from-white to-gray-100 py-8 md:py-16"
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
        {/* Image */}
        <div className="w-full">
          <img
            src="construction-team.jpg"
            alt="Two construction workers reviewing architectural plans on site"
            loading="lazy"
            className="rounded-2xl shadow-lg  h-auto object-cover w-[85%]"
          />
        </div>

        {/* Content */}
        <div>
          <p className="text-pink-600 font-semibold uppercase tracking-wide">
            About Us
          </p>
          <h2 className="text-2xl md:text-3xl font-bold text-gray-900 mb-4">
            Crafting structures that last a lifetime
          </h2>
          <p className="text-gray-700 leading-relaxed mb-4">
            Building enduring structures requires a comprehensive approach that
            combines advanced materials, resilient design, routine maintenance,
            and sustainable practices. By drawing on historical insights and
            utilizing modern technology, we ensure every project is built to
            stand the test of time.
          </p>
          <p className="text-gray-700 leading-relaxed">
            Our designs seamlessly blend cutting-edge materials, durable
            engineering, ongoing upkeep, and eco-friendly practices. We combine
            lessons from the past with the power of today’s innovation,
            delivering results that inspire confidence for generations.
          </p>
        </div>
      </div>
    </section>
  );
}
export default AboutSection;
