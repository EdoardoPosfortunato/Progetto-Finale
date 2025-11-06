import React, { useEffect, useState } from "react";
import axios from "axios";
import { Link, useLocation } from "react-router-dom";
import RingLoader from "react-spinners/Ringloader";

const BonsaiList = () => {
  const [bonsais, setBonsais] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  const location = useLocation();
  const searchParams = new URLSearchParams(location.search);
  const searchQuery = searchParams.get("search");

  useEffect(() => {
    if (searchQuery === null) {
      // carica tutti i bonsai
      axios.get("http://localhost:8000/api/bonsai").then((res) => {
        setBonsais(res.data);
        setLoading(false);
      });
      return;
    }

    // altrimenti filtra
    axios
      .get("http://localhost:8000/api/bonsai", {
        params: { search: searchQuery },
      })
      .then((res) => {
        setBonsais(res.data);
        setLoading(false);
      });
  }, [searchQuery]);

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

  if (loading) {
    return (
      <div className="d-flex justify-content-center align-items-center margin-loading">
        <RingLoader color="#047624" size={200} />
      </div>
    );
  }

  if (error) return <p>Errore: {error}</p>;

  return (
    <div>
     <div className="d-flex justify-content-between align-items-center my-5">
  <h2 className="text-center flex-grow-1">
          {searchQuery ? `Risultati per: "${searchQuery}"` : "Tutti i bonsai"}
        </h2>

        {searchQuery && (
          <form action="/bonsai" method="get" className="ms-3">
            <input type="hidden" name="search" value="" />
            <button type="submit" className="btn btn-outline-secondary">
              🔄 Azzera ricerca
            </button>
          </form>
        )}
      </div>

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
                      <Link
                        to={`/bonsai/${bonsai.id}`}
                        className="btn btn-outline-primary"
                      >
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
