const services = [
  {
    title: "Mumbai projects",
    description: "",
    image: "/images/specialty.jpg",
    alt: "Specialty construction building under development",
  },
  {
    title: "Delhi Projects",
    description:
      "Civil construction is a core sector within the construction industry that focuses on the design, development, and maintenance of infrastructure that supports modern society.",
    image: "/images/civil.jpg",
    alt: "Civil construction workers working indoors",
  },
  {
    title: "Residential Construction",
    description: "",
    image: "/images/residential.jpg",
    alt: "Architect reviewing residential building plans",
  },
  {
    title: "Commercial Construction",
    description: "",
    image: "/images/commercial.jpg",
    alt: "Commercial building under construction",
  },
  {
    title: "Industrial Construction",
    description: "",
    image: "/images/industrial.jpg",
    alt: "Industrial plant construction site",
  },
];

function ProductCards() {
  return (
    <section className="py-16 bg-gradient-to-b from-white to-slate-300">
      <div className="container mx-auto px-4">
        {/* SEO-friendly headings */}
        <header className="text-center mb-12">
          <p className="text-pink-600 font-semibold uppercase tracking-wide">
            Our Products
          </p>
          <h2 className="text-3xl md:text-4xl font-bold text-gray-900">
            Explore Our Diverse range of Products
          </h2>
          <p className="mt-4 text-gray-600 max-w-2xl mx-auto">
            We specialize in a wide range of construction services, including
            residential, commercial, and industrial projects.
          </p>
        </header>

        {/* Responsive Grid */}
        <div className="grid gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
          {services.map((service, idx) => (
            <article
              key={idx}
              className="relative group rounded-2xl overflow-hidden shadow-lg cursor-pointer"
            >
              {/* Image */}
              <img
                src={service.image}
                alt={service.alt}
                className="w-full h-64 object-cover transform group-hover:scale-105 transition duration-500"
              />

              {/* Overlay on hover */}
              <div className="absolute inset-0 bg-gradient-to-t from-black/70 via-black/20 to-transparent"></div>

              {/* Text Content */}
              <div className="absolute bottom-4 left-4 right-4 transition-all duration-500 transform group-hover:bottom-1/3">
                <h3 className="text-white text-lg font-bold">
                  {service.title}
                </h3>
                {service.description && (
                  <p className="text-gray-200 text-sm mt-2 opacity-0 group-hover:opacity-100 transition-opacity duration-500">
                    {service.description}
                  </p>
                )}
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
export default ProductCards;
