function ContactWelcome() {
  return (
    <section className="bg-gradient-to-r from-blue-50 via-white to-blue-50 py-16 px-6 md:px-12 lg:px-20">
      <div className="max-w-6xl mx-auto text-center">
        {/* Small Heading */}
        <p className="text-blue-600 font-semibold uppercase tracking-widest text-sm mb-3">
          Get in Touch
        </p>

        {/* Main Heading */}
        <h1 className="text-3xl md:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight">
          We’d Love to Hear From You
        </h1>

        {/* Description */}
        <p className="mt-4 text-gray-600 max-w-2xl mx-auto">
          Whether you have a question, feedback, or just want to say hello —
          feel free to drop us a message. We usually respond within 24 hours.
        </p>

        {/* Highlighted Contact Info */}
        <div className="mt-10 flex flex-col md:flex-row items-center justify-center gap-6">
          <div className="bg-white shadow-md rounded-2xl p-6 w-full md:w-1/3 hover:shadow-lg transition duration-300">
            <h3 className="text-lg font-semibold text-gray-800">📧 Email Us</h3>
            <p className="text-gray-500 mt-2">support@yourdomain.com</p>
          </div>

          <div className="bg-white shadow-md rounded-2xl p-6 w-full md:w-1/3 hover:shadow-lg transition duration-300">
            <h3 className="text-lg font-semibold text-gray-800">📞 Call Us</h3>
            <p className="text-gray-500 mt-2">+91 98765 43210</p>
          </div>

          <div className="bg-white shadow-md rounded-2xl p-6 w-full md:w-1/3 hover:shadow-lg transition duration-300">
            <h3 className="text-lg font-semibold text-gray-800">📍 Visit Us</h3>
            <p className="text-gray-500 mt-2">123, Your Street, Your City</p>
          </div>
        </div>
      </div>
    </section>
  );
}
export default ContactWelcome;
