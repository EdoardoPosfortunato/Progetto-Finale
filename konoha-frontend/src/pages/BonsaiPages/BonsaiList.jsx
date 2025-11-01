import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link } from "react-router-dom";

const BonsaiList = () => {
  const [bonsais, setBonsais] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios
      .get("http://localhost:8000/api/bonsai", {
        withCredentials: true, // se usi cookie/sessione
        headers: {
          "Content-Type": "application/json",
          // Authorization: `Bearer ${token}`, // se usi JWT
        },
      })
      .then((response) => {
        setBonsais(response.data);
        setLoading(false);
      })
      .catch((error) => {
        setError(error.message);
        setLoading(false);
      });
  }, []);

  if (loading) return <p>Caricamento in corso...</p>;
  if (error) return <p>Errore: {error}</p>;

  return (
    <div>
      <h2 className="text-center my-5">I Nostri Bonsai</h2>

      <div className="container">
        <div className="row">
          {bonsais.map((bonsai) => (
            <div className="col-md-6 mb-4" key={bonsai.id}>
              <div className="card h-100">
                <div className="row g-0">
                  <div className="col-5">
                    <img
                      src={
                        bonsai.immagine
                          ? `http://localhost:8000/storage/${bonsai.immagine}`
                          : "/assets/placeholder.png"
                      }
                      className="img-fluid rounded-start h-100 object-fit-cover"
                      alt={bonsai.nome || "Bonsai"}
                    />
                  </div>
                  <div className="col-7">
                    <div className="card-body">
                      <h5 className="card-title">{bonsai.nome}</h5>
                      <p className="card-text">{bonsai.descrizione}</p>
                      <p className="card-text">
                        Prezzo: <strong>{bonsai.prezzo} $ </strong>
                      </p>
                      <Link to={`/bonsai/${bonsai.id}`} className="btn btn-outline-primary">
                        Dettagli
                      </Link>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
};

export default BonsaiList;
