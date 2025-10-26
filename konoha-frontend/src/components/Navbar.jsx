import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';
import './Navbar.css';

function Navbar() {
  return (
    <nav className="navbar navbar-dark px-4">
      <div className="container-fluid d-flex justify-content-between align-items-center">
        {/* Logo */}
        <a className="navbar-brand" href="/">🌿 Konoha</a>

        {/* Bottone toggle per offcanvas su mobile */}
        <button
          className="navbar-toggler d-lg-none"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#mobileMenu"
          aria-controls="mobileMenu"
        >
          <span className="navbar-toggler-icon"></span>
        </button>

        {/* Menu desktop */}
        <div className="d-none d-lg-flex flex-grow-1 justify-content-between align-items-center">
          {/* Menu centrale */}
          <ul className="navbar-nav flex-row gap-4 mx-auto">
            <li className="nav-item">
              <a className="nav-link" href="/">Home</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/bonsai">Bonsais</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/about">Chi siamo</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/contact">Contatti</a>
            </li>
          </ul>

          {/* Search a destra */}
          <form className="d-flex" role="search">
            <input
              className="form-control"
              type="search"
              placeholder="Cerca..."
              aria-label="Search"
            />
          </form>
        </div>
      </div>

      {/* Offcanvas menu per mobile */}
      <div
        className="offcanvas offcanvas-end text-bg-dark"
        tabIndex="-1"
        id="mobileMenu"
        aria-labelledby="mobileMenuLabel"
      >
        <div className="offcanvas-header">
          <h5 className="offcanvas-title" id="mobileMenuLabel">Menu</h5>
          <button type="button" className="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div className="offcanvas-body d-flex flex-column align-items-center gap-4">
          {/* Search centrata */}
          <form className="d-flex w-100" role="search">
            <input
              className="form-control"
              type="search"
              placeholder="Cerca..."
              aria-label="Search"
            />
          </form>

          {/* Menu mobile */}
          <ul className="navbar-nav text-center">
            <li className="nav-item">
              <a className="nav-link" href="/">Home</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/bonsai">Bonsais</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/about">Chi siamo</a>
            </li>
            <li className="nav-item">
              <a className="nav-link" href="/contact">Contatti</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
}

export default Navbar;
