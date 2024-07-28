// import express from "express";
// import http from "http";
// import { Server } from "socket.io";
// import dotenv from "dotenv";

// dotenv.config();

// const app = express();
// const server = http.createServer(app);

// const io = new Server(server, {
//     cors: { origin: "*" },
// });

// io.on("connection", (socket) => {
//     socket.on("updateTransition", (message) => {
//         console.log("message", message);
//         if (message === "reloadTransition") {
//             socket.broadcast.emit("updateTransition");
//         }
//     });
// });

// const port = process.env.VITE_SOCKET_IO_PORT || 3000;
// server.listen(port, () => {
//     // To know server is running or not
//     console.log("Server is running. Port: " + port);
// });
