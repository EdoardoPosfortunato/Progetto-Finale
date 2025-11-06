import { useEffect, useState } from "react";
import { useParams, Link } from "react-router-dom";
import axios from "axios";
import RingLoader from "react-spinners/Ringloader";

const BonsaiDetail = () => {
  const { id } = useParams();
  const [bonsai, setBonsai] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    axios
      .get(`http://localhost:8000/api/bonsai/${id}`)
      .then((res) => setBonsai(res.data))
      .catch((err) => console.error(err))
      .finally(() => setLoading(false));
  }, [id]);

  if (loading) {
    return (
      <div className="d-flex justify-content-center align-items-center margin-loading">
        <RingLoader color="#047624" size={200} />
      </div>
    );
  }

  if (!bonsai) {
    return (
      <div className="container text-center my-5">
        <h4 className="text-muted">Bonsai non trovato 🌱</h4>
        <Link to="/" className="btn btn-outline-success mt-3">
          Torna alla lista
        </Link>
      </div>
    );
  }

  return (
    <div className="container my-5">
      <div className="card shadow-lg border-0 rounded-4 overflow-hidden">
        {/* Immagine principale */}
        <div className="position-relative">
          <img
            src={
              bonsai.immagine
                ? `http://localhost:8000/storage/${bonsai.immagine}`
                : "/assets/placeholder.png"
            }
            alt={bonsai.nome}
            className="w-100"
            style={{ height: "400px", objectFit: "cover" }}
          />
          <div
            className="position-absolute bottom-0 start-0 w-100 text-white p-3"
            style={{
              background:
                "linear-gradient(to top, rgba(0,0,0,0.7), rgba(0,0,0,0))",
            }}
          >
            <h2 className="fw-bold mb-0">{bonsai.nome}</h2>
          </div>
        </div>

        {/* Contenuto */}
        <div className="card-body px-4 py-4">
          {/* Specie */}
          {bonsai.species && (
            <p className="mb-2">
              <span className="fw-semibold text-success">Specie:</span>{" "}
              {bonsai.species.nome}
            </p>
          )}

          {/* Tipologie */}
          {bonsai.tipologies && bonsai.tipologies.length > 0 && (
            <p className="mb-3">
              <span className="fw-semibold text-success">Tipologie:</span>{" "}
              {bonsai.tipologies.map((t) => (
                <span
                  key={t.id}
                  className="badge bg-light text-success border border-success me-1"
                >
                  {t.nome}
                </span>
              ))}
            </p>
          )}

          {/* Descrizione */}
          <p className="text-secondary fs-5">{bonsai.descrizione}</p>

          {/* Prezzo */}
          {bonsai.prezzo && (
            <h4 className="text-success fw-bold mt-3">
              Prezzo: € {bonsai.prezzo}
            </h4>
          )}

          {/* Pulsante torna indietro */}
          <div className="text-center mt-4">
            <Link
              to="/"
              className="btn btn-outline-success px-4 py-2 rounded-pill"
            >
              <i className="bi bi-arrow-left"></i> Torna alla lista
            </Link>
          </div>
        </div>
      </div>
    </div>
  );
};

export default BonsaiDetail;
