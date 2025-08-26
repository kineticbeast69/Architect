import { useLocation } from "react-router-dom";
function IntroSection() {
  const location = useLocation();
  return (
    <section
      className="relative bg-cover bg-center bg-no-repeat "
      style={{
        backgroundImage: "url('/about-page.jpeg')", // Replace with your background image
      }}
      aria-label="About Our Construction Services"
    >
      {/* Overlay */}
      <div className="absolute inset-0 bg-black bg-opacity-50"></div>

      {/* Content */}
      <div className="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 md:py-28">
        <div className="text-left max-w-2xl">
          {/* Tagline */}
          <p className="text-yellow-400 font-semibold text-lg md:text-xl mb-2 tracking-wide">
            Quality. Integrity. Value.
          </p>

          {/* Heading */}
          <h1 className="text-4xl sm:text-5xl font-bold capitalize text-white leading-tight">
            {location.pathname}
          </h1>

          {/* Description */}
          <p className="mt-4 text-gray-200 text-lg leading-relaxed">
            We offer a diverse array of construction services, spanning
            residential, commercial, and industrial projects.
          </p>
        </div>
      </div>
    </section>
  );
}
export default IntroSection;
