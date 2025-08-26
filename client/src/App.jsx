import { Outlet } from "react-router-dom";
import Header from "./components/header";
import Footer from "./components/footer";
function App() {
  return (
    <div className="flex flex-col w-full h-[100vh]">
      {/* header section */}
      <Header />
      <div className="grow">
        <Outlet />
      </div>
      {/* footer section */}
      <Footer />
    </div>
  );
}

export default App;
