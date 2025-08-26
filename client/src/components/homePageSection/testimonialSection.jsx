import { Swiper, SwiperSlide } from "swiper/react";
import { Pagination, Autoplay } from "swiper/modules";
import "swiper/css";
import "swiper/css/pagination";

const testimonials = [
  {
    name: "Elvira Shields",
    role: "Associate",
    img: "https://randomuser.me/api/portraits/women/44.jpg",
    rating: 5,
    text: "Minima vel consectetur voluptatem unde. Mollitia et ea aspernatur non sint ullam deserunt sunt quisquam. Quia delectus ipsum provident veritatis dolores repellendus.",
  },
  {
    name: "Sherry Gislason",
    role: "Designer",
    img: "https://randomuser.me/api/portraits/men/32.jpg",
    rating: 5,
    text: "Minima vel consectetur voluptatem unde. Mollitia et ea aspernatur non sint ullam deserunt sunt quisquam. Quia delectus ipsum provident veritatis dolores repellendus.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
  {
    name: "Lowell Franecki MD",
    role: "Architect",
    img: "https://randomuser.me/api/portraits/women/65.jpg",
    rating: 5,
    text: "Modi est harum aut dolores provident cum. Perspiciatis natus quos doloremque nostrum aut qui provident omnis. Quibusdam qui reprehenderit incidunt sed molestiae libero.",
  },
];

function TestimonialSection() {
  return (
    <section className="bg-gradient-to-b from-white to-slate-300 py-16">
      <div className="max-w-6xl mx-auto px-4 text-center">
        <h2 className="text-3xl md:text-4xl font-bold mb-4">
          What people are saying about us
        </h2>
        <p className="text-gray-600 mb-12 max-w-2xl mx-auto">
          We offer a diverse array of construction services, spanning
          residential, commercial, and industrial projects.
        </p>

        <Swiper
          modules={[Pagination, Autoplay]}
          spaceBetween={30}
          slidesPerView={1}
          pagination={{ clickable: true }}
          autoplay={{ delay: 2000, disableOnInteraction: false }}
          breakpoints={{
            768: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
          }}
          className="pb-12"
        >
          {testimonials.map((t, i) => (
            <SwiperSlide key={i}>
              <article className="bg-white rounded-2xl shadow-lg p-6 flex flex-col justify-between h-full border border-gray-100 hover:shadow-blue-300 transition-shadow duration-300 ">
                <div>
                  {/* Rating */}
                  <div className="flex mb-4">
                    {Array(t.rating)
                      .fill(0)
                      .map((_, idx) => (
                        <svg
                          key={idx}
                          className="w-5 h-5 text-yellow-400"
                          fill="currentColor"
                          viewBox="0 0 20 20"
                        >
                          <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.18 3.64a1 1 0 00.95.69h3.832c.969 0 1.371 1.24.588 1.81l-3.1 2.253a1 1 0 00-.364 1.118l1.18 3.64c.3.921-.755 1.688-1.54 1.118l-3.1-2.253a1 1 0 00-1.176 0l-3.1 2.253c-.784.57-1.838-.197-1.539-1.118l1.18-3.64a1 1 0 00-.364-1.118L2.42 9.067c-.783-.57-.38-1.81.588-1.81h3.832a1 1 0 00.95-.69l1.18-3.64z" />
                        </svg>
                      ))}
                  </div>
                  {/* Text */}
                  <p className="text-gray-600 mb-6">{t.text}</p>
                </div>

                {/* Author */}
                <div className="flex items-center border-t border-gray-200 pt-4">
                  <img
                    src={t.img}
                    alt={`${t.name} photo`}
                    className="w-12 h-12 rounded-full object-cover mr-4"
                  />
                  <div className="text-left">
                    <p className="font-semibold text-gray-900">{t.name}</p>
                    <p className="text-gray-500 text-sm">{t.role}</p>
                  </div>
                </div>
              </article>
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </section>
  );
}
export default TestimonialSection;
