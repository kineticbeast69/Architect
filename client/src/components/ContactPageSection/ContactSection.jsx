import { useForm } from "react-hook-form";
function ContactSection() {
  const {
    register,
    handleSubmit,
    formState: { errors },
  } = useForm();
  const submitForm = (data) => {
    console.log(data);
  };
  return (
    <section
      className="py-8 px-6 md:px-12 lg:px-20 bg-gradient-to-b from-white to-slate-300"
      aria-labelledby="contact-heading"
    >
      <div className="max-w-6xl mx-auto">
        {/* Heading */}
        <div className="text-center mb-12">
          <h1
            id="contact-heading"
            className="text-3xl md:text-4xl font-extrabold text-gray-900"
          >
            Contact Us
          </h1>
          <p className="mt-4 text-gray-600 max-w-2xl mx-auto">
            Our dedicated experts are here to help you with any of your
            questions. Contact us by filling out the form below and we will be
            in touch shortly.
          </p>
        </div>

        {/* Contact Form */}
        <form
          className="bg-white shadow-lg rounded-2xl p-6 space-y-4"
          method="POST"
          aria-label="Contact form"
          onSubmit={handleSubmit(submitForm)}
        >
          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            {/* name filed section */}
            <div>
              <label
                htmlFor="name"
                className="block text-sm font-medium text-gray-700"
              >
                Name
              </label>
              <input
                id="name"
                name="name"
                type="text"
                placeholder="Enter Your Name"
                maxLength="90"
                className="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                {...register("name", {
                  required: "Name is required.",
                  minLength: {
                    value: 3,
                    message: "Name must have 3 characters.",
                  },
                  maxLength: {
                    value: 90,
                    message: "Name can't be longer than 90 characters.",
                  },
                  pattern: {
                    value: /^[A-Za-z]+(?: [A-Za-z]+)*$/,
                    message: "Name can have only Alphabets.",
                  },
                })}
              />
              {errors.name && (
                <p className="text-sm ml-1 italic text-red-600">
                  {errors.name.message}
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="email"
                className="block text-sm font-medium text-gray-700"
              >
                Email
              </label>
              <input
                id="email"
                name="email"
                type="email"
                placeholder="Enter Your Email"
                className="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                {...register("email", {
                  required: "Email is required.",
                  pattern: {
                    value: /^[^\s@]+@[^\s@]+\.[^\s@]+$/,
                    message: "Enter the valid email address.",
                  },
                })}
              />
              {errors.email && (
                <p className="text-sm text-red-600 italic ml-1">
                  {errors.email.message}
                </p>
              )}
            </div>
          </div>

          <div className="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
              <label
                htmlFor="phone"
                className="block text-sm font-medium text-gray-700"
              >
                Phone
              </label>
              <input
                id="phone"
                name="phone"
                type="tel"
                maxLength="10"
                placeholder="Phone No."
                className="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                {...register("phone", {
                  required: "Phone No. is required.",
                  minLength: {
                    value: 10,
                    message: "Phone no. Must have 10 numbers.",
                  },
                  maxLength: {
                    value: 10,
                    message: "Phone no. can't be greater than 10 number.",
                  },
                  pattern: {
                    value: /^[0-9\s\-()+]{7,15}$/,
                    message: "Enter a valid phone number",
                  },
                })}
              />
              {errors.phone && (
                <p className="text-sm text-red-600 italic ml-1">
                  {errors.phone.message}
                </p>
              )}
            </div>

            <div>
              <label
                htmlFor="subject"
                className="block text-sm font-medium text-gray-700"
              >
                Subject
              </label>
              <input
                id="subject"
                name="subject"
                type="text"
                placeholder="Subject"
                className="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                {...register("subject", {
                  required: "Subject is required.",
                  minLength: {
                    value: 3,
                    message: "Subject must have 3 characters.",
                  },
                  maxLength: {
                    value: 100,
                    message: "Subject can't be longer than 100 characters.",
                  },
                  pattern: {
                    value: /^[A-Za-z0-9\s.,!?'-]{3,100}$/,
                    message:
                      "Subject  contain only letters, numbers, and basic punctuation",
                  },
                })}
              />
              {errors.subject && (
                <p className="text-red-600 italic text-sm ml-1">
                  {errors.subject.message}
                </p>
              )}
            </div>
          </div>

          <div>
            <label
              htmlFor="message"
              className="block text-sm font-medium text-gray-700"
            >
              Message
            </label>
            <textarea
              id="message"
              name="message"
              rows="4"
              placeholder="Your Message"
              className="mt-1 w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
              {...register("messages", {
                required: "Message is required.",
                minLength: {
                  value: 10,
                  message: "Message must have 10 characters.",
                },
                maxLength: {
                  value: 1000,
                  message: "Message can't be more than 1000 characters.",
                },
                pattern: {
                  value: /^[A-Za-z0-9\s.,!?'"@#$%&*()\-_=+/:;]{10,1000}$/,
                  message: "Message  contain valid characters",
                },
              })}
            ></textarea>
            {errors.messages && (
              <p className="text-red-600 text-sm italic ml-1">
                {errors.messages.message}
              </p>
            )}
          </div>

          <button
            type="submit"
            className="w-full bg-blue-600 text-white font-medium py-3 px-6 rounded-lg hover:bg-blue-700 transition-colors duration-300"
          >
            Send Message
          </button>
        </form>
      </div>
    </section>
  );
}
export default ContactSection;
