import { Link } from "react-router-dom";
function WelcomeSection() {
  return (
    <section
      className="relative w-full h-[80vh] bg-cover bg-center bg-no-repeat"
      style={{
        backgroundImage: "url('/construction.jpg')",
      }}
    >
      {/* Dark overlay for better text contrast */}
      <div className="absolute inset-0 bg-black bg-opacity-40"></div>

      {/* Content */}
      <div className="relative z-10 max-w-6xl mx-auto px-4 py-20 sm:py-28 text-center text-white">
        {/* SEO Heading */}
        <p className="text-yellow-400 font-semibold text-lg sm:text-xl mb-2">
          Welcome to Architect
        </p>

        <h1 className="text-3xl sm:text-5xl lg:text-6xl font-extrabold leading-tight">
          Crafting dreams with <br className="hidden sm:block" />
          precision and excellence.
        </h1>

        <p className="mt-4 text-base sm:text-lg max-w-3xl mx-auto text-gray-200">
          We excel at transforming visions into reality through outstanding
          craftsmanship and precise attention to detail. With years of
          experience and a dedication to quality.
        </p>

        {/* Buttons */}
        <div className="mt-8 flex flex-col sm:flex-row justify-center gap-4">
          <Link
            to="/contact-us"
            className="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3 rounded-md font-semibold transition"
          >
            Contact Now
          </Link>
          <Link
            to="/our-projects"
            className="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-md font-semibold transition"
          >
            View Projects
          </Link>
        </div>
      </div>
    </section>
  );
}

export default WelcomeSection;
