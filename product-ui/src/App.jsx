import { useEffect, useState } from "react";
import api from "./api/api";

export default function App() {
  const [products, setProducts] = useState([]);
  const [name, setName] = useState("");
  const [price, setPrice] = useState("");
  const [loading, setLoading] = useState(false);
  const [error, setError] = useState("");

  const fetchProducts = async () => {
    try {
      setLoading(true);
      const res = await api.get("/products");
      setProducts(res.data.data);
    } catch {
      setError("Failed to load products");
    } finally {
      setLoading(false);
    }
  };

  const addProduct = async (e) => {
    e.preventDefault();
    try {
      await api.post("/products", { name, price });
      setName("");
      setPrice("");
      fetchProducts();
    } catch {
      alert("Error adding product");
    }
  };

  useEffect(() => {
    fetchProducts();
  }, []);

  return (
    <div className="min-h-screen bg-gray-100 flex justify-center p-6">
      <div className="bg-white shadow-lg rounded-xl w-full max-w-lg p-6">
        <h1 className="text-2xl font-bold text-center mb-6">
          Product Management
        </h1>

        <form onSubmit={addProduct} className="space-y-3 mb-6">
          <input
            className="w-full border rounded-lg p-2"
            placeholder="Product name"
            value={name}
            onChange={(e) => setName(e.target.value)}
            required
          />

          <input
            className="w-full border rounded-lg p-2"
            placeholder="Price"
            type="number"
            value={price}
            onChange={(e) => setPrice(e.target.value)}
            required
          />

          <button
            className="w-full bg-black text-white py-2 rounded-lg"
            disabled={loading}
          >
            Add Product
          </button>
        </form>

        {loading && <p className="text-center">Loading...</p>}
        {error && <p className="text-red-500 text-center">{error}</p>}

        <ul className="space-y-2">
          {products.map((p) => (
            <li
              key={p.id}
              className="flex justify-between border rounded-lg p-3"
            >
              <span>{p.name}</span>
              <span className="font-semibold">${p.price}</span>
            </li>
          ))}
        </ul>
      </div>
    </div>
  );
}
