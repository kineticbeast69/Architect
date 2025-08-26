import { Link } from "react-router-dom";

const services = [
  {
    title: "Specialty Construction",
    img: "/sepical-construction.jpg",
    description:
      "We handle unique and complex construction projects requiring specialized skills.",
  },
  {
    title: "Civil Construction",
    img: "/civil-construction.jpg",
    description:
      "Focused on designing, developing, and maintaining infrastructure that supports society.",
  },
  {
    title: "Residential Construction",
    img: "/residential-construction.jpg",
    description:
      "Building quality homes tailored to comfort, style, and modern living standards.",
  },
  {
    title: "Corporate Construction",
    img: "/corporate-construciton.jpg",
    description:
      "Creating functional, stylish, and efficient workspaces for businesses of all sizes.",
  },
];

const ServicesSection = () => {
  return (
    <section className="py-8 bg-gray-300" aria-labelledby="services-heading">
      <div className="text-center mb-10">
        <p className="text-pink-600 font-semibold uppercase tracking-wide">
          Our Services
        </p>
        <h2
          id="services-heading"
          className="text-3xl md:text-4xl font-bold text-gray-900"
        >
          Our Construction Services
        </h2>
        <p className="text-gray-600 max-w-2xl mx-auto mt-2">
          We offer a diverse array of construction services, spanning
          residential, commercial, and industrial projects.
        </p>
      </div>

      <div className="max-w-7xl mx-auto px-4 grid gap-6 sm:grid-cols-2 lg:grid-cols-4">
        {services.map((service, index) => (
          <article
            key={index}
            className="relative group rounded-xl overflow-hidden shadow-lg bg-white"
          >
            <img
              src={service.img}
              alt={service.title}
              className="w-full h-64 object-cover"
              loading="lazy"
            />
            <div className="absolute bottom-0 left-0 w-full bg-gradient-to-t from-black/80 to-transparent p-4">
              <h3 className="text-lg font-semibold text-white">
                {service.title}
              </h3>
            </div>

            {/* Hover Overlay */}
            <div className="absolute bottom-[-100%] left-0 w-full h-full bg-black/80 p-6 flex flex-col justify-center items-center text-center text-white transition-all duration-700 ease-in-out group-hover:bottom-2">
              <p className="mb-4">{service.description}</p>
              <a
                href={`/services/${service.title
                  .toLowerCase()
                  .replace(/\s+/g, "-")}`}
                className="px-4 py-2 bg-pink-600 hover:bg-pink-700 rounded-full text-sm font-medium"
              >
                Read More
              </a>
            </div>
          </article>
        ))}
      </div>
      <div className="mt-6 flex items-center justify-center">
        {" "}
        <Link
          to="/services"
          className="bg-pink-600 hover:bg-pink-700 text-white px-6 py-3  rounded-md font-semibold transition"
        >
          View All Services
        </Link>
      </div>
    </section>
  );
};

export default ServicesSection;
