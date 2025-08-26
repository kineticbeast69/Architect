import App from "../App";
import { createBrowserRouter } from "react-router-dom";

//----------------------pages
import InvalidRoutePage from "../page/invalidRoute.page";
import HomePage from "../page/home.page";
import AboutPage from "../page/about.page";
import ProjectsPage from "../page/project.page";
import ServicesPage from "../page/services.page";
import ContactUsPage from "../page/contacUs.page";
import BlogPage from "../page/blog.page";
import LoginPage from "../page/login.page";
export const routes = createBrowserRouter([
  {
    path: "/",
    element: <App />,
    children: [
      {
        path: "/",
        element: <HomePage />,
      },
      {
        path: "/about-us",
        element: <AboutPage />,
      },
      {
        path: "/services",
        element: <ServicesPage />,
      },
      {
        path: "/our-projects",
        element: <ProjectsPage />,
      },
      {
        path: "/contact-us",
        element: <ContactUsPage />,
      },
    ],
    errorElement: <InvalidRoutePage />,
  },
  // blog page separate page
  {
    path: "/blogs",
    element: <BlogPage />,
  },
  {
    path: "/login",
    element: <LoginPage />,
  },
]);
