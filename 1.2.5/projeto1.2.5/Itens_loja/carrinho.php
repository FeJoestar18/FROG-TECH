<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frog Tech - Carrinho</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }

        body {
            background-color: #fafafa;
            color: #333;
            line-height: 1.6;
        }

        header {
            background-color: #fff;
            padding: 15px;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 180px;
            height: auto;
        }

        .menu-icon {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            width: 30px;
            height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .menu-icon:hover .bar {
            background-color: #4CAF50;
        }

        .bar {
            height: 3px;
            width: 100%;
            background-color: #333;
            border-radius: 5px;
            transition: 0.3s;
        }

        .cart-icon {
            width: 24px;
            height: 24px;
            cursor: pointer;
        }

        .cart-count {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: red;
            color: white;
            border-radius: 50%;
            padding: 3px 6px;
            font-size: 0.8rem;
        }

        .titulo {
            margin-top: 120px;
            text-align: center;
            padding: 20px;
        }

        .titulo h1 {
            color: #333;
            font-size: 3rem;
            font-weight: 600;
        }

        .titulo h3 {
            margin-top: 10px;
            color: #666;
            font-size: 1.5rem;
            font-weight: 300;
        }

        .cart-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 60px 20px;
        }

        .cart-item {
            background-color: #fff;
            padding: 15px;
            border-radius: 8px;
            margin: 10px 0;
            width: 80%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .remove-btn {
            padding: 5px 10px;
            background-color: #ff0000;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .remove-btn:hover {
            background-color: #cc0000;
        }

        .checkout-container {
            display: flex;
            justify-content: center; /* Centraliza o botão */
            margin-top: 20px;
        }

        .checkout-btn {
            padding: 15px 30px;
            background-color: #4CAF50;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .checkout-btn:hover {
            background-color: #388e3c;
        }

        .store-btn {
            padding: 15px 30px;
            background-color: #007BFF;
            color: white;
            font-size: 1.2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            margin-top: 20px;
            display: none; /* Escondido por padrão */
        }

        .store-btn:hover {
            background-color: #0056b3;
        }

        footer {
            color: #fff;
            text-align: center;
            padding: 20px 0;
            background-color: ;
            position: relative;
            width: 100%;
            margin-top: 50px;
        }

        footer p {
            font-size: 0.9rem;
            color: black;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            top: 0;
            right: -300px;
            width: 300px;
            height: 100%;
            background-color: #fff;
            box-shadow: -2px 0 10px rgba(0, 0, 0, 0.05);
            transition: 0.5s;
            z-index: 1001;
        }

        .sidebar.open {
            right: 0;
        }

        .sidebar ul {
            list-style: none;
            padding: 20px;
            margin: 0;
        }

        .sidebar ul li {
            padding: 15px 0;
            border-bottom: 1px solid #e1e1e1;
        }

        .sidebar ul li a {
            text-decoration: none;
            color: #333;
            font-size: 1.1rem;
            transition: color 0.3s ease;
        }

        .sidebar ul li a:hover {
            color: #4CAF50;
        }

        .sidebar ul li a.logout {
            color: #ff0000;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            display: none;
            z-index: 1000;
        }

        .overlay.show {
            display: block;
        }

        @media (max-width: 768px) {
            .titulo h1 {
                font-size: 2.5rem;
            }

            .titulo h3 {
                font-size: 1.2rem;
            }
        }
    </style>
</head>

<body>
    <header>
        <div class="logo">
            <img src="../img/logo2.png" alt="Frog Tech Logo">
        </div>

        <div class="menu-icon" id="menuIcon">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
    </header>

    <div class="sidebar" id="sidebarMenu">
        <ul>
            <li><a href="../paginas_iniciais/loja.html">Loja</a></li>
            <li><a href="../paginas_iniciais/paginahome.php">Home</a></li>
            <li><a href="../paginas_cadastros/perfil.php">Perfil de Usuário</a></li>
            <li><a href=../paginas_cadastros/logout.php class="logout">Sair</a></li>
        </ul>
    </div>

    <div class="overlay" id="overlay"></div>

    <div class="titulo">
        <h1>Seu Carrinho</h1>
        <h3>Revise seus produtos antes da compra</h3>
    </div>

    <div class="cart-container" id="cartContainer">
        <!-- Itens do carrinho serão adicionados aqui via JavaScript -->
    </div>

    <div class="checkout-container">
        <button class="checkout-btn" onclick="finalizePurchase()">Finalizar Compra</button>
    </div>

    <div class="checkout-container" id="emptyCartContainer" style="display: none;">
        <h3>Seu carrinho está vazio. Vá à loja!</h3>
        <button class="store-btn" onclick="window.location.href='loja.htm'">Ir às Compras</button>
    </div>

    <footer>
        <p>Frog Tech © 2024. Todos os direitos reservados.</p>
    </footer>
    <script>
        const menuIcon = document.getElementById('menuIcon');
        const sidebar = document.getElementById('sidebarMenu');
        const overlay = document.getElementById('overlay');

        menuIcon.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
        });

        let cartItems = [];
        const cartCount = document.getElementById('cartCount');
        const cartContainer = document.getElementById('cartContainer');
        const emptyCartContainer = document.getElementById('emptyCartContainer');

        function addToCart(item) {
            cartItems.push(item);
            updateCart();
        }

        function updateCart() {
            cartContainer.innerHTML = '';
            if (cartItems.length === 0) {
                emptyCartContainer.style.display = 'block'; // Exibe mensagem quando o carrinho está vazio
            } else {
                emptyCartContainer.style.display = 'none'; // Esconde a mensagem quando há itens
                cartItems.forEach((item, index) => {
                    const cartItem = document.createElement('div');
                    cartItem.className = 'cart-item';
                    cartItem.innerHTML = `
                        <span>${item.name} - R$${item.price}</span>
                        <button class="remove-btn" onclick="removeFromCart(${index})">Remover</button>
                    `;
                    cartContainer.appendChild(cartItem);
                });
            }
        }

        function removeFromCart(index) {
            cartItems.splice(index, 1);
            updateCart();
        }

        function finalizePurchase() {
            if (cartItems.length === 0) {
                alert('Seu carrinho está vazio!');
                return;
            }
            // Lógica para finalizar a compra
            alert('Compra finalizada com sucesso!');
            cartItems = [];
            updateCart();
        }

    </script>
</body>

</html>
