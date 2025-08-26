const teamMembers = [
  {
    name: "John Doe",
    role: "Web Developer",
    image: "https://via.placeholder.com/400x400", // Replace with your image
    linkedin: "https://www.linkedin.com/",
  },
  {
    name: "John Doe",
    role: "Team Leader",
    image: "https://via.placeholder.com/400x400",
    linkedin: "https://www.linkedin.com/",
  },
  {
    name: "John Doe",
    role: "Project Manager",
    image: "https://via.placeholder.com/400x400",
    linkedin: "https://www.linkedin.com/",
  },
  {
    name: "John Doe",
    role: "Civil Engineer",
    image: "https://via.placeholder.com/400x400",
    linkedin: "https://www.linkedin.com/",
  },
];

function TeamSection() {
  return (
    <section
      className="py-16 bg-gradient-to-b from-white to-slate-300"
      aria-labelledby="our-team"
    >
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        {/* Heading */}
        <p className="text-pink-500 font-semibold uppercase tracking-widest">
          Team
        </p>
        <h2
          id="our-team"
          className="text-3xl sm:text-4xl font-bold text-gray-900"
        >
          Our Team
        </h2>
        <p className="mt-4 text-gray-600 max-w-2xl mx-auto">
          We specialize in a wide range of construction services, including
          residential, commercial, and industrial projects.
        </p>

        {/* Team Grid */}
        <div className="mt-10 grid gap-8 sm:grid-cols-2 lg:grid-cols-4">
          {teamMembers.map((member, index) => (
            <article
              key={index}
              className="bg-white shadow-lg rounded-3xl overflow-hidden hover:shadow-xl transition-shadow duration-300"
            >
              <img
                src={member.image}
                alt={`${member.name} - ${member.role}`}
                className="w-full h-64 object-cover"
                loading="lazy"
              />
              <div className="p-4">
                <h3 className="text-lg font-semibold text-gray-900">
                  {member.name}
                </h3>
                <p className="text-gray-500 text-sm">{member.role}</p>
                <div className="mt-3">
                  <a
                    href={member.linkedin}
                    target="_blank"
                    rel="noopener noreferrer"
                    aria-label={`LinkedIn profile of ${member.name}`}
                    className="inline-block text-gray-700 hover:text-blue-600 transition"
                  >
                    <svg
                      xmlns="http://www.w3.org/2000/svg"
                      width="20"
                      height="20"
                      fill="currentColor"
                      viewBox="0 0 24 24"
                    >
                      <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.762 0 5-2.239 5-5v-14c0-2.761-2.238-5-5-5zm-11 19h-3v-10h3v10zm-1.5-11.268c-.966 0-1.75-.784-1.75-1.75s.784-1.75 1.75-1.75 1.75.784 1.75 1.75-.783 1.75-1.75 1.75zm13.5 11.268h-3v-5.604c0-1.337-.027-3.063-1.868-3.063-1.868 0-2.155 1.46-2.155 2.968v5.699h-3v-10h2.885v1.367h.041c.402-.762 1.386-1.563 2.854-1.563 3.053 0 3.618 2.009 3.618 4.623v5.573z" />
                    </svg>
                  </a>
                </div>
              </div>
            </article>
          ))}
        </div>
      </div>
    </section>
  );
}
export default TeamSection;
