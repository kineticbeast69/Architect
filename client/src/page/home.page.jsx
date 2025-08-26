import WelcomeSection from "../components/homePageSection/welcomeSection";
import AboutSection from "../components/aboutSection";
import ServicesSection from "../components/servicesSection";
import ProjectSection from "../components/homePageSection/projectSection";
import ChooseSection from "../components/homePageSection/chooseSection";
import TestimonialSection from "../components/homePageSection/testimonialSection";
function HomePage() {
  return (
    <main>
      <WelcomeSection />
      <AboutSection />
      <ServicesSection />
      <ChooseSection />
      <ProjectSection />
      <TestimonialSection />
    </main>
  );
}
export default HomePage;
