import React from "react";

function Azienda() {
  return (

    <div className="container py-5">
      <h1 className="text-center mb-4">Chi siamo</h1>

      <div className="row justify-content-center mb-5">
        <div className="col-md-8">
          <p className="lead">
            Benvenuti da <strong>Konoha</strong>, dove l’arte del bonsai incontra la passione per la natura e la cultura giapponese.
          </p>

          <p>
            Fondata nel cuore della Toscana, Konoha nasce dall’amore per la bellezza essenziale e la cura dei dettagli. Ogni bonsai che coltiviamo è il frutto di anni di esperienza, pazienza e rispetto per il ritmo della natura.
          </p>

          <p>
            La nostra missione è offrire non solo piante, ma esperienze: un bonsai è una finestra sul tempo, un invito alla contemplazione, un gesto di armonia. Collaboriamo con esperti vivaisti e artigiani per garantire qualità, autenticità e sostenibilità.
          </p>

          <p>
            Che tu sia un collezionista esperto o un appassionato alle prime armi, troverai in Konoha un punto di riferimento per scoprire, imparare e coltivare la tua passione.
          </p>
        </div>
      </div>

      {/* Sezione valori */}
      <div className="row text-center mb-5">
        <div className="col-md-4">
          <h4>🌱 Cura</h4>
          <p>Ogni bonsai è seguito con attenzione, rispetto e dedizione artigianale.</p>
        </div>
        <div className="col-md-4">
          <h4>🌿 Tradizione</h4>
          <p>Ci ispiriamo alla filosofia giapponese per coltivare bellezza e equilibrio.</p>
        </div>
        <div className="col-md-4">
          <h4>🌎 Sostenibilità</h4>
          <p>Usiamo materiali naturali e tecniche ecologiche per proteggere l’ambiente.</p>
        </div>
      </div>

      {/* Sezione team */}
      <div className="row justify-content-center mb-5">
        <div className="col-md-8">
          <h3 className="text-center mb-3">Il nostro team</h3>
          <p>
            Siamo un gruppo di vivaisti, designer e appassionati di bonsai che condividono una visione comune: rendere accessibile l’arte della miniatura vegetale. Ogni membro del team porta competenze uniche, dalla potatura alla progettazione di espositori, dalla logistica alla consulenza.
          </p>
        </div>
      </div>

      {/* Sezione invito */}
      <div className="text-center">
        <p className="fs-5">
          Vieni a trovarci nel nostro vivaio a Loro Ciuffenna, oppure esplora la collezione online.
        </p>
        <a href="/contact" className="btn btn-success mt-3">
          📬 Contattaci
        </a>
      </div>
    </div>
  );
}

export default Azienda;
