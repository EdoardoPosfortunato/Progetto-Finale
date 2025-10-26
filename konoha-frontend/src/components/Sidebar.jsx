import "bootstrap/dist/css/bootstrap.min.css";
import "./Sidebar.css";

function Sidebar() {
  return (
    <>
          <aside className="sidebar d-none d-lg-block p-3">
            <ul className="nav flex-column">
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Specie Rare
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Sempreverdi
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Fioriti
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Miniature
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Da Interno
                </a>
              </li>
              <li className="nav-item">
                <a className="nav-link nav-hover-black" href="#">
                  Da Esterno
                </a>
              </li>
            </ul>
          </aside>
    </>
  );
}

export default Sidebar;
