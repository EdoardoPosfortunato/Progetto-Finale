import React, { useEffect, useState } from 'react';
import axios from 'axios';

const BonsaiList = () => {
  const [bonsais, setBonsais] = useState([]);
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState(null);

  useEffect(() => {
    axios.get('http://localhost:8000/api/bonsai', {
      withCredentials: true, // se usi cookie/sessione
      headers: {
        'Content-Type': 'application/json',
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
      <h2>Lista Bonsai</h2>
      <ul>
        {bonsais.map((bonsai) => (
          <li key={bonsai.id}>
            {bonsai.nome} – {bonsai.id_specie ?.nome || 'Specie sconosciuta'}
          </li>
        ))}
      </ul>
    </div>
  );
};

export default BonsaiList;