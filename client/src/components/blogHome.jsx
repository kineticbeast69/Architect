import React from "react";

const BlogHome = () => {
  const blogs = [
    {
      id: 1,
      title: "How to Build a Modern Blog with React & TailwindCSS",
      excerpt:
        "Learn how to create a fully responsive, modern blog homepage using React and Tailwind CSS with best SEO practices.",
      image:
        "https://images.unsplash.com/photo-1498050108023-c5249f4df085?w=800&q=80",
      date: "Aug 13, 2025",
      author: "Shubham Tiwari",
      tags: ["React", "TailwindCSS"],
    },
    {
      id: 2,
      title: "Optimizing React Apps for SEO",
      excerpt:
        "React apps can be SEO-friendly with the right techniques. Here’s how to do it effectively.",
      image:
        "https://images.unsplash.com/photo-1581093588401-22b85d64b6a6?w=800&q=80",
      date: "Aug 10, 2025",
      author: "John Doe",
      tags: ["SEO", "React"],
    },
    {
      id: 3,
      title: "Understanding TailwindCSS Utility Classes",
      excerpt:
        "TailwindCSS offers powerful utility classes for rapid UI development. Let’s explore its magic.",
      image:
        "https://images.unsplash.com/photo-1505238680356-667803448bb6?w=800&q=80",
      date: "Aug 8, 2025",
      author: "Jane Smith",
      tags: ["TailwindCSS", "CSS"],
    },
  ];

  const featured = blogs[0];

  return (
    <main className="bg-gradient-to-b from-white to-slate-300 min-h-screen py-10">
      <section className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {/* Featured Post */}
        <div className="mb-12">
          <article className="relative rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-shadow duration-300">
            <img
              src={featured.image}
              alt={featured.title}
              className="w-full h-80 object-cover transform hover:scale-105 transition-transform duration-300"
              loading="lazy"
            />
            <div className="absolute inset-0 bg-gradient-to-t from-black/70 to-transparent p-6 flex flex-col justify-end">
              <h1 className="text-3xl sm:text-4xl font-bold text-white mb-3">
                {featured.title}
              </h1>
              <p className="text-gray-200 mb-3 max-w-xl">{featured.excerpt}</p>
              <div className="flex gap-3 text-sm text-gray-300">
                <span className="bg-white/20 px-3 py-1 rounded-full">
                  {featured.date}
                </span>
                <span className="bg-white/20 px-3 py-1 rounded-full">
                  By {featured.author}
                </span>
              </div>
            </div>
          </article>
        </div>

        {/* Blog Grid */}
        <div className="grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          {blogs.map((blog) => (
            <article
              key={blog.id}
              className="bg-white rounded-xl shadow-md hover:shadow-xl transition-shadow duration-300 overflow-hidden group"
            >
              <div className="overflow-hidden">
                <img
                  src={blog.image}
                  alt={blog.title}
                  className="w-full h-48 object-cover transform group-hover:scale-105 transition-transform duration-300"
                  loading="lazy"
                />
              </div>
              <div className="p-5">
                {/* Tags */}
                <div className="flex gap-2 mb-2">
                  {blog.tags.map((tag, i) => (
                    <span
                      key={i}
                      className="bg-indigo-100 text-indigo-700 text-xs px-2 py-1 rounded-full"
                    >
                      {tag}
                    </span>
                  ))}
                </div>
                <h2 className="text-lg font-semibold text-gray-800 mb-2 group-hover:text-indigo-600 transition-colors duration-300">
                  {blog.title}
                </h2>
                <p className="text-gray-600 text-sm mb-3">{blog.excerpt}</p>
                <div className="flex gap-3 text-sm text-gray-500">
                  <span className="bg-gray-100 px-3 py-1 rounded-full">
                    {blog.date}
                  </span>
                  <span className="bg-gray-100 px-3 py-1 rounded-full">
                    By {blog.author}
                  </span>
                </div>
              </div>
            </article>
          ))}
        </div>
      </section>
    </main>
  );
};

export default BlogHome;
