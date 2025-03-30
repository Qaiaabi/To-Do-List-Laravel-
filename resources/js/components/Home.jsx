import React from "react";

export default function Home() {
    return (
        <div className="bg-white shadow-lg rounded-xl p-6 text-center">
            <h1 className="text-3xl font-bold text-blue-600 mb-4">
                Welcome to Your Home Page!
            </h1>
            <p className="text-gray-600">This page is powered by Laravel + React.</p>
            <button className="mt-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-700 transition">
                Click Me!
            </button>
        </div>
    );
}
