import React, { useState } from "react";
import { Link, NavLink } from "react-router-dom";

function Header() {
  const [isMobileOpen, setIsMobileOpen] = useState(false);
  const links = ["about-us", "services", "our-projects", "blogs", "contact-us"];
  const pageLinks = links.map((link) => {
    return (
      <NavLink
        key={link}
        to={`/${link}`}
        className={({ isActive }) =>
          isActive
            ? "text-pink-600 font-semibold"
            : "text-gray-900 hover:text-pink-600 "
        }
      >
        {link.toUpperCase()}
      </NavLink>
    );
  });
  const toggleMenu = () => setIsMobileOpen(!isMobileOpen);

  return (
    <nav className="bg-white shadow-md">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="flex justify-between items-center h-16">
          {/* Logo */}
          <div className="flex-shrink-0 text-xl font-bold ">
            <Link
              to="/"
              className="text-pink-600 flex items-center justify-center gap-0"
            >
              <img
                src="./logo.svg"
                alt="company_logo"
                className="w-16 md:w-20 lg:w-24"
              />
              <span className="text-gray-800 font-semibold">Architect</span>
            </Link>
          </div>

          {/* Desktop Nav */}
          <div className="hidden md:flex space-x-8">{pageLinks}</div>

          {/* Mobile Menu Button */}
          <div className="md:hidden">
            <button
              onClick={toggleMenu}
              className="text-gray-700 focus:outline-none"
            >
              <svg
                className="w-6 h-6"
                fill="none"
                stroke="currentColor"
                strokeWidth="2"
                viewBox="0 0 24 24"
                strokeLinecap="round"
                strokeLinejoin="round"
              >
                <path d="M4 6h16M4 12h16M4 18h16" />
              </svg>
            </button>
          </div>
        </div>
      </div>

      {/* Mobile Menu */}
      {isMobileOpen && (
        <div className="md:hidden px-4 pb-4 space-y-2 flex flex-col">
          {pageLinks}
        </div>
      )}
    </nav>
  );
}

export default Header;
