

import Navbar from '../components/Navbar';
import Sidebar from '../components/Sidebar';
import { Outlet } from 'react-router-dom';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './GuestLayout.css';

function GuestLayout() {
  return (
    <div className="container-fluid p-0">
      {/* Navbar in alto */}
      <Navbar />

      {/* Contenuto sotto la navbar */}
      <div className="row m-0 vh-100" >
        {/* Outlet a sinistra */}

        {/* Sidebar a destra */}
        <div className="col-md-3 col-lg-2 col-sm-0 border-start d-flex justify-content-start align-items-center color-sidebar sfondo-sfumato">
          <Sidebar />
        </div>
        <div className="col-md-9 col-lg-10 p-4 overflow-auto">
          <Outlet />
        </div>
      </div>
    </div>
  );
}

export default GuestLayout;
