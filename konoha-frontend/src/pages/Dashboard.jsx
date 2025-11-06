import axios from "axios";
import React, { useEffect, useState } from "react";
import { Link } from "react-router-dom";
import RingLoader from "react-spinners/Ringloader";

function Dashboard() {
  const [bonsais, setBonsais] = useState([]);
  const [randomBonsais, setRandomBonsais] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/bonsai", {
        withCredentials: true,
        headers: {
          "Content-Type": "application/json",
        },
      })
      .then((response) => {
        setBonsais(response.data);
        const shuffled = [...response.data].sort(() => 0.5 - Math.random());
        const selected = shuffled.slice(0, 5);
        setRandomBonsais(selected);
        setLoading(false);
      })
      .catch((error) => {
        setError(error.message);
        setLoading(false);
      });
  }, []);

  if (loading) {
    return (
      <div className="d-flex justify-content-center vh-100 margin-loading my-5">
        <RingLoader color="#047624" size={200} />
      </div>
    );
  }

  if (error)
    return <div className="text-danger text-center mt-5">Errore: {error}</div>;

  return (
    <div className="container mt-5">
      <h1 className="text-center mb-5">🌿 Benvenuti a Konoa</h1>

      {/* Carosello dinamico */}
      <div
        id="carouselExampleCaptions"
        className="carousel slide mb-5"
        data-bs-ride="carousel"
      >
        <div className="carousel-indicators">
          {randomBonsais.map((_, index) => (
            <button
              key={index}
              type="button"
              data-bs-target="#carouselExampleCaptions"
              data-bs-slide-to={index}
              className={index === 0 ? "active" : ""}
              aria-current={index === 0 ? "true" : undefined}
              aria-label={`Slide ${index + 1}`}
            ></button>
          ))}
        </div>

        <div className="carousel-inner">
          {randomBonsais.map((bonsai, index) => (
            <div
              key={bonsai.id}
              className={`carousel-item ${index === 0 ? "active" : ""}`}
            >
              <img
                src={
                  bonsai.immagine
                    ? `http://localhost:8000/storage/${bonsai.immagine}`
                    : "/assets/placeholder.png"
                }
                className="d-block w-100"
                alt={bonsai.nome}
                style={{ height: "400px", objectFit: "cover" }}
              />
              <div className="carousel-caption d-none d-md-block bg-dark bg-opacity-75 rounded p-2">
                <h5>
                  <Link
                    className="text-decoration-none text-white"
                    to={`/bonsai/${bonsai.id}`}
                  >
                    {bonsai.nome}
                  </Link>
                </h5>
                <p>
                  {bonsai.descrizione?.slice(0, 100) ||
                    "Nessuna descrizione disponibile."}
                </p>
              </div>
            </div>
          ))}
        </div>

        <button
          className="carousel-control-prev"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev"
        >
          <span
            className="carousel-control-prev-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Previous</span>
        </button>
        <button
          className="carousel-control-next"
          type="button"
          data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next"
        >
          <span
            className="carousel-control-next-icon"
            aria-hidden="true"
          ></span>
          <span className="visually-hidden">Next</span>
        </button>
      </div>

      {/* Collegamenti rapidi */}
      <div className="row text-center">
        <div className="d-flex mb-3">
          <Link to="/bonsai" className="btn btn-success w-100 py-3">
            🌳 Guarda i nostri Bonsai
          </Link>
        </div>
        <div className="col-md-4 mb-3"></div>
      </div>
    </div>
  );
}

export default Dashboard;
