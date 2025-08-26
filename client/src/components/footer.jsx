import { Link } from "react-router-dom";

function Footer() {
  const links = ["about-us", "services", "our-projects", "blogs", "contact-us"];
  const pageLinks = links.map((link) => {
    return (
      <li key={link}>
        <Link to={`/${link}`} className="hover:text-white">
          {link}
        </Link>
      </li>
    );
  });
  return (
    <footer className="bg-gray-900 text-gray-300">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-8">
        {/* Company Info */}
        <div>
          <h3 className="text-lg font-semibold text-yellow-500">Architect</h3>
          <p className="mt-4 text-sm leading-relaxed">
            Our post-construction services give you peace of mind knowing that
            we are still here for you even after your project is complete.
          </p>
        </div>

        {/* Services */}
        <nav aria-label="Our Services">
          <h3 className="text-lg font-semibold text-yellow-500">
            Our Services
          </h3>
          <ul className="mt-4 space-y-2">
            <li>
              <Link to="/services/specialty" className="hover:text-white">
                Specialty Construction
              </Link>
            </li>
            <li>
              <Link to="/services/civil" className="hover:text-white">
                Civil Construction
              </Link>
            </li>
            <li>
              <Link to="/services/residential" className="hover:text-white">
                Residential Construction
              </Link>
            </li>
            <li>
              <Link to="/services/corporate" className="hover:text-white">
                Corporate Construction
              </Link>
            </li>
            <li>
              <Link to="/services/building" className="hover:text-white">
                Building Constructions
              </Link>
            </li>
            <li>
              <Link to="/services/industrial" className="hover:text-white">
                Industrial Construction
              </Link>
            </li>
          </ul>
        </nav>

        {/* Quick Links */}
        <nav aria-label="Quick Links">
          <h3 className="text-lg font-semibold text-yellow-500">Quick Links</h3>
          <ul className="mt-4 space-y-2">{pageLinks}</ul>
        </nav>

        {/* Contact */}
        <div>
          <h3 className="text-lg font-semibold text-yellow-500">Contact Us</h3>
          <ul className="mt-4 space-y-2 text-sm">
            <li>
              <a href="tel:8880000000" className="hover:text-white">
                (888)-000-0000
              </a>
            </li>
            <li>
              <a href="mailto:info@example.com" className="hover:text-white">
                support@yourdomain.com
              </a>
            </li>
            <li>123, Your Street, Your City</li>
            <li>+91 98765 43210</li>
          </ul>
        </div>
      </div>

      {/* Bottom Bar */}
      <div className="border-t border-gray-700 py-4 text-center text-sm text-gray-500">
        Copyright © {new Date().getFullYear()} Architect. All Rights Reserved.
      </div>
    </footer>
  );
}
export default Footer;
