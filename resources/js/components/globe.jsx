import ReactDOM from "react-dom/client";
import React, { useEffect, useRef } from "react";
import createGlobe from "cobe";
import { color, useSpring } from "framer-motion";

function Globe(props) {
    const {
        background = "#000000",
        baseColor = "#333333",
        glowColor = "#ffffff",
        markerColor = "#ffffff",
        isDraggable = true,
        dragOptions = { stiffness: 200, damping: 40, mass: 1 },
        speed = 1,
        phi = 0,
        theta = 0.3,
        dark = 1,
        diffuse = 2,
        mapBrightness = 20,
        maxSamples = 20000,
        markerSize = 0.1,
        markerArray = [{ latitude: 36.8065, longitude: 10.1815 }],
        scale = 1,
        alignment = "center",
        maxWidth = 800,
        offset = { offsetX: 0, offsetY: 0 },
    } = props;

    const canvasRef = useRef();
    const pointerInteracting = useRef(null);
    const pointerInteractionMovement = useRef(0);
    const r = useSpring(0, {
        stiffness: dragOptions.stiffness,
        damping: dragOptions.damping,
        mass: dragOptions.mass,
        restDelta: 1e-4,
        restSpeed: 1e-4,
    });
    const fadeMask =
        "radial-gradient(circle at 50% 50%, rgba(0,0,0,1) 60%, rgba(0,0,0,0) 70%)";

    useEffect(() => {
        let phiValue = phi;
        let width = 0;

        const onResize = () => {
            if (canvasRef.current) {
                width = canvasRef.current.offsetWidth;
            }
        };

        onResize();
        window.addEventListener("resize", onResize);

        const baseConvert = convertRGB(baseColor);
        const glowConvert = convertRGB(glowColor);
        const markerConvert = convertRGB(markerColor);

        const globe = createGlobe(canvasRef.current, {
            devicePixelRatio: 2,
            width: width * 3,
            height: width * 3,
            phi: phi,
            theta: theta,
            dark: dark,
            diffuse: diffuse,
            mapSamples: maxSamples,
            mapBrightness: mapBrightness,
            baseColor: [baseConvert.r, baseConvert.g, baseConvert.b],
            glowColor: [glowConvert.r, glowConvert.g, glowConvert.b],
            markerColor: [markerConvert.r, markerConvert.g, markerConvert.b],
            markers: markerArray.map((marker) => ({
                location: [marker.latitude, marker.longitude],
                size: markerSize,
            })),
            scale: scale,
            onRender: (state) => {
                state.phi = phiValue + r.get();
                state.width = width * 2;
                state.height = width * 2;
                phiValue += speed / 400;
            },
        });

        const onPointerDown = (e) => {
            if (isDraggable) {
                pointerInteracting.current =
                    e.clientX - pointerInteractionMovement.current;
                // canvasRef.current.style.cursor = "grabbing";
            }
        };

        const onPointerUp = () => {
            if (isDraggable) {
                pointerInteracting.current = null;
                // canvasRef.current.style.cursor = "grab";
            }
        };

        const onPointerMove = (e) => {
            if (isDraggable && pointerInteracting.current !== null) {
                const delta = e.clientX - pointerInteracting.current;
                pointerInteractionMovement.current = delta;
                r.set(delta / 100);
            }
        };

        canvasRef.current.addEventListener("pointerdown", onPointerDown);
        canvasRef.current.addEventListener("pointerup", onPointerUp);
        canvasRef.current.addEventListener("pointermove", onPointerMove);

        return () => {
            globe.destroy();
            window.removeEventListener("resize", onResize);
            canvasRef.current.removeEventListener("pointerdown", onPointerDown);
            canvasRef.current.removeEventListener("pointerup", onPointerUp);
            canvasRef.current.removeEventListener("pointermove", onPointerMove);
        };
    }, []);

    const convertRGB = (color) => {
        const r = parseInt(color.slice(1, 3), 16) / 255;
        const g = parseInt(color.slice(3, 5), 16) / 255;
        const b = parseInt(color.slice(5, 7), 16) / 255;
        return { r, g, b };
    };

    return (
        <div style={{ width: "100%", height: "100%" }}>
            <canvas
                ref={canvasRef}
                style={{
                    width: "100%",
                    height: "100%",
                    userSelect: "none",
                }}
            />
        </div>
    );
}

export default Globe;

if (document.getElementById("globe")) {
    const root = ReactDOM.createRoot(document.getElementById("globe"));

    root.render(
        <React.StrictMode>
            <Globe
                background="#000000"
                baseColor="#333333"
                glowColor="#ffffff"
                markerColor="#3dffdb"
                markerArray={[
                    { latitude: 36.8065, longitude: 10.1815 }, // Tunis, Tunisia
                ]}
                speed={1}
                isDraggable={true}
            />
        </React.StrictMode>
    );
}
