import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { Nav } from "react-bootstrap";
import { NavLink } from "react-router-dom";

function Sidebar() {
  const logOut = async () => {
    localStorage.removeItem("accessToken");
  };

  return (
    <>
      <Nav className="nav flex-column gap-3 text-center">
        <NavLink to="/" className="nav-link text-dark">
          <FontAwesomeIcon icon={["fas", "house"]} />
        </NavLink>
        <NavLink to="/user" className="nav-link text-dark">
          User
        </NavLink>
        <NavLink to="/occupants" className="nav-link text-dark">
          Occupant
        </NavLink>
        <NavLink to="/houses" className="nav-link text-dark">
          House
        </NavLink>
        <NavLink to="/payments" className="nav-link text-dark">
          Payment
        </NavLink>
        <NavLink to="/reports" className="nav-link text-dark">
          Report
        </NavLink>
        <NavLink to="/login" onClick={logOut} className="nav-link text-dark">
          <FontAwesomeIcon icon={["fas", "arrow-right-from-bracket"]} />
          <span className="ms-2">Logout</span>
        </NavLink>
      </Nav>
    </>
  );
}

export default Sidebar;
