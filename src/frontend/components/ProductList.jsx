import { useState, useEffect } from "react";
import { useNavigate } from "react-router-dom";
import axios from "axios";

const ProductList = () => {
  const [products, setProducts] = useState([]);
  const navigate = useNavigate();

  useEffect(() => {
    fetchProducts();
  }, []);

  const fetchProducts = () => {
    axios
      .get("http://product-manager.infinityfreeapp.com/api.php")
      .then((response) => {
        setProducts(response.data);
      })
      .catch((error) => {
        console.error("Error fetching products:", error);
      });
  };

  const handleMassDelete = () => {
    const selectedProducts = products.filter((product) => product.selected);
    const productIds = selectedProducts.map((product) => product.id);

    axios
      .delete("http://product-manager.infinityfreeapp.com/api.php", {
        data: { productIds },
      })
      .then(() => {
        fetchProducts();
      })
      .catch((error) => {
        console.error("Error deleting products:", error);
      });
  };

  const handleCheckboxChange = (productId) => {
    setProducts(
      products.map((product) => {
        if (product.id === productId) {
          return { ...product, selected: !product.selected };
        }
        return product;
      })
    );
  };

  return (
    <div className="container">
      <h1 className="my-4">Product List</h1>
      <div className="row">
        {products.map((product) => (
          <div key={product.id} className="col-lg-4 col-md-6 mb-4">
            <div className={`card ${product.selected ? "border-primary" : ""}`}>
              <div className="card-body">
                <input
                  type="checkbox"
                  className="delete-checkbox"
                  checked={product.selected || false}
                  onChange={() => handleCheckboxChange(product.id)}
                />
                <h5 className="card-title mt-2">{product.name}</h5>
                <p className="card-text">SKU: {product.sku}</p>
                <p className="card-text">Price: ${product.price}</p>
                <p className="card-text">{renderProductDetails(product)}</p>
              </div>
            </div>
          </div>
        ))}
      </div>
      <div className="mt-4">
        <button
          className="btn btn-primary mr-2"
          onClick={() => navigate("/add-product")}
        >
          ADD
        </button>
        <button className="btn btn-danger" onClick={handleMassDelete}>
          MASS DELETE
        </button>
      </div>
    </div>
  );
};

const renderProductDetails = (product) => {
  switch (product.type) {
    case "DVD":
      return `Size: ${product.size} MB`;
    case "Book":
      return `Weight: ${product.weight} Kg`;
    case "Furniture":
      return `Dimensions: ${product.height}x${product.width}x${product.length} cm`;
    default:
      return "";
  }
};

export default ProductList;
