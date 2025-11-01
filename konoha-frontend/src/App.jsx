import { useEffect, useState } from "react";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import GuestLayout from "./layout/GuestLayout";
import Dashboard from "./pages/Dashboard";
import BonsaiList from "./pages/BonsaiPages/BonsaiList";
import BonsaiDetail from "./pages/BonsaiPages/BonsaiDetail";
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
            <Route path="/bonsai/:id" element={<BonsaiDetail />} />
          </Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
