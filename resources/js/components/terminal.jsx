import { TypeAnimation } from "react-type-animation";
import ReactDOM from "react-dom/client";
import React from "react";

const TerminalAnimation = () => {
    return (
        <div>
            {/* Progress Messages */}

            <TypeAnimation
                sequence={[
                    'const project = {\n  type: "Website",\n  stack: ["Laravel", "React", "Tailwind"]\n}',
                    2000,
                    "",
                    500,
                ]}
                wrapper="pre"
                style={{ whiteSpace: "pre-wrap" }}
                cursor={true}
                repeat={Infinity}
                className="block"
                speed={30}
            />
        </div>
    );
};

export default TerminalAnimation;

if (document.getElementById("terminal")) {
    const root = ReactDOM.createRoot(document.getElementById("terminal"));

    root.render(
        <React.StrictMode>
            <TerminalAnimation></TerminalAnimation>
        </React.StrictMode>
    );
}
