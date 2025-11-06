import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import "./Navbar.css";
import { useNavigate } from "react-router-dom";
import { useState } from "react";

function Navbar() {
  const [searchQuery, setSearchQuery] = useState("");
  const navigate = useNavigate();

  const handleSearchSubmit = (e) => {
    e.preventDefault();
    if (searchQuery.trim()) {
      navigate(`/bonsai?search=${encodeURIComponent(searchQuery.trim())}`);
      setSearchQuery("");
    }
  };

  return (
    <nav className="navbar navbar-dark px-4">
      <div className="container-fluid d-flex justify-content-between align-items-center">
        {/* Logo */}
        <a className="navbar-brand" href="/">🌿 Konoha</a>

        {/* Toggle mobile */}
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
        <div className="d-none d-lg-flex flex-grow-1 align-items-center">
          {/* Menu centrale centrato */}
          <div className="w-100 d-flex justify-content-center">
            <ul className="navbar-nav flex-row gap-4">
              <li className="nav-item">
                <a className="nav-link" href="/">Home</a>
              </li>
              <li className="nav-item">
                <a className="nav-link" href="/bonsai">Bonsais</a>
              </li>
              <li className="nav-item">
                <a className="nav-link" href="/about">Chi siamo</a>
              </li>
            </ul>
          </div>

          {/* Search a destra */}
          <form className="d-flex ms-auto" role="search" onSubmit={handleSearchSubmit}>
            <input
              className="form-control"
              type="search"
              placeholder="Cerca..."
              aria-label="Search"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
            />
          </form>
        </div>
      </div>

      {/* Offcanvas mobile */}
      <div
        className="offcanvas offcanvas-end text-bg-dark"
        tabIndex="-1"
        id="mobileMenu"
        aria-labelledby="mobileMenuLabel"
      >
        <div className="offcanvas-header">
          <h5 className="offcanvas-title" id="mobileMenuLabel">Menu</h5>
          <button
            type="button"
            className="btn-close btn-close-white"
            data-bs-dismiss="offcanvas"
            aria-label="Close"
          ></button>
        </div>

        <div className="offcanvas-body d-flex flex-column align-items-center gap-4">
          {/* Search mobile */}
          <form className="d-flex w-100" role="search" onSubmit={handleSearchSubmit}>
            <input
              className="form-control"
              type="search"
              placeholder="Cerca..."
              aria-label="Search"
              value={searchQuery}
              onChange={(e) => setSearchQuery(e.target.value)}
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
