import { useEffect, useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import GuestLayout from "./layout/GuestLayout";
import Dashboard from "./pages/Dashboard";
import BonsaiList from "./pages/BonsaiPages/BonsaiList";
import BonsaiForm from "./pages/BonsaiPages/BonsaiForm";
import "./layout/GuestLayout.css";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          {/* <Route path="*" element={<NotFound />} /> */}
          <Route element={<GuestLayout />}>
            <Route path="/" element={<Dashboard />} />
            <Route path="/bonsai" element={<BonsaiList />} />
            <Route path="/bonsaiform" element={<BonsaiForm />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
