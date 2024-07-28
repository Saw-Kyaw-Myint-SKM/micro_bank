import "./bootstrap";
import { io } from "socket.io-client";

import Alpine from "alpinejs";

window.Alpine = Alpine;

// let ipAddress = window.location.hostname;

// // Get the Socket.IO port from environment variables
// let socketPort = import.meta.env.VITE_SOCKET_IO_PORT;

// // Initialize the Socket.IO connection
// window.socket = io(`${ipAddress}:${socketPort}`);
// // Example to listen for connection error
// window.socket.on("connect_error", (error) => {
//     console.error("Connection error:", error);
// });

// window.socket.on("connect_error", (error) => {
//     console.error("Connection error:", error);
// });

// // Example to listen for a connection event
// window.socket.on("connect", () => {
//     console.log("Connected to Socket.IO server");
// });

Alpine.start();
