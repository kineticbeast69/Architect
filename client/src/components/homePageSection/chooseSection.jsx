// WhyChooseUs.jsx
import React from "react";
import { Lightbulb, Award, Target } from "lucide-react"; // Lucide icons

const features = [
  {
    icon: (
      <Lightbulb className="w-10 h-10 text-yellow-500" aria-hidden="true" />
    ),
    title: "Cutting-Edge Solutions",
    description:
      "Small actions create big impacts. It all begins and ends with each employee committing to safer work practices daily, ensuring they return home safely.",
  },
  {
    icon: <Award className="w-10 h-10 text-yellow-500" aria-hidden="true" />,
    title: "Cutting-Edge Solutions",
    description:
      "Small actions create big impacts. It all begins and ends with each employee committing to safer work practices daily, ensuring they return home safely.",
  },
  {
    icon: <Target className="w-10 h-10 text-yellow-500" aria-hidden="true" />,
    title: "Cutting-Edge Solutions",
    description:
      "Small actions create big impacts. It all begins and ends with each employee committing to safer work practices daily, ensuring they return home safely.",
  },
];

function ChooseSection() {
  return (
    <section
      className="py-16 bg-white "
      aria-labelledby="why-choose-us-heading"
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <p className="text-pink-600 font-semibold uppercase tracking-wide">
          Why Choose Us
        </p>
        <h2
          id="why-choose-us-heading"
          className="mt-2 text-3xl md:text-4xl font-bold text-gray-900"
        >
          Discover our wide variety of projects.
        </h2>
        <p className="mt-4 text-gray-600 max-w-3xl mx-auto">
          Created in close partnership with our clients and collaborators, this
          approach merges industry expertise, decades of experience, innovation,
          and flexibility to consistently deliver excellence.
        </p>

        <div className="mt-12 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
          {features.map((feature, index) => (
            <article
              key={index}
              className="p-6 bg-white rounded-2xl shadow-md hover:shadow-xl hover:shadow-blue-400 transition-shadow duration-300 text-left"
            >
              <div className="flex md:flex-col items-center  gap-2">
                <div className="mb-4">{feature.icon}</div>
                <h3 className="text-lg font-semibold text-gray-900">
                  {feature.title}
                </h3>
              </div>
              <p className="mt-2 text-gray-600">{feature.description}</p>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}

export default ChooseSection;
