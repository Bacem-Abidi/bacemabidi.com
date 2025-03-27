import MDEditor, { commands } from "@uiw/react-md-editor";
import React, { useState, useEffect, useRef } from "react";
import ReactDOM from "react-dom/client";

export default function MarkdownEditor({
    initialContent,
    saveRoute,
    uploadRoute,
}) {
    const [value, setValue] = useState(initialContent || "");
    const [isSaving, setIsSaving] = useState(false);

    const [theme, setTheme] = useState(
        document.documentElement.classList.contains("dark") ? "dark" : "light"
    );

    useEffect(() => {
        const observer = new MutationObserver(() => {
            setTheme(
                document.documentElement.classList.contains("dark")
                    ? "dark"
                    : "light"
            );
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ["class"],
        });

        return () => observer.disconnect();
    }, []);

    const handleImageUpload = async (file) => {
        const formData = new FormData();
        formData.append("image", file);

        try {
            const response = await fetch(uploadRoute, {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: formData,
            });

            const data = await response.json();
            if (!response.ok) throw new Error(data.message || "Upload failed");

            return data.url; // Return the URL to insert in markdown
        } catch (error) {
            alert("Image must not be greater than 2048 kilobytes.");
            return "";
        }
    };

    const components = {
        a: ({ href, children }) => (
            <a href={href} target="_blank" rel="noopener noreferrer">
                {children}
            </a>
        ),
    };

    const handleSave = async () => {
        setIsSaving(true);
        try {
            const response = await fetch(saveRoute, {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": document.querySelector(
                        'meta[name="csrf-token"]'
                    ).content,
                },
                body: JSON.stringify({ content: value }),
            });

            if (!response.ok) throw new Error("Save failed");
            alert("Saved successfully!");
        } catch (error) {
            alert(error.message);
        } finally {
            setIsSaving(false);
        }
    };

    const uploadImage = {
        name: "uploadImage",
        keyCommand: "uploadImage",
        render: (command, disabled, executeCommand) => {
            return (
                <label
                    title="Upload image"
                    className="bg-gray-500 dark:bg-gray-200 text-white dark:text-gray-800 cursor-pointer inline-flex items-center px-2 py-1 rounded-lg transition ease-in-out duration-150"
                >
                    Upload Image
                    <input
                        type="file"
                        className="hidden"
                        accept="image/*"
                        onChange={async (e) => {
                            const file = e.target.files[0];
                            if (file) {
                                const url = await handleImageUpload(file);
                                if (url) {
                                    const markdownImage = `![${file.name}](${url})`;
                                    setValue(value + `\n${markdownImage}`);
                                }
                            }
                            e.target.value = null; // Reset input
                        }}
                    />
                </label>
            );
        },
        execute: (state, api) => {
            let modifyText = `## ${state.selectedText}\n`;
            if (!state.selectedText) {
                modifyText = `## `;
            }
            api.replaceSelection(modifyText);
        },
    };

    return (
        <div className="container mx-auto p-6">
            <div className="mb-4 flex justify-between items-center">
                <h1 className="text-2xl font-bold">Case Study Editor</h1>
                <button
                    onClick={handleSave}
                    disabled={isSaving}
                    className="inline-flex items-center px-4 py-2 bg-gray-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white dark:text-gray-800 uppercase tracking-widest hover:bg-gray-700 dark:hover:bg-white focus:bg-gray-700 dark:focus:bg-white active:bg-gray-900 dark:active:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-teal focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-50 transition ease-in-out duration-150"
                >
                    {isSaving ? "Saving..." : "Save Changes"}
                </button>
            </div>
            <MDEditor
                value={value}
                onChange={setValue}
                height={600}
                commands={[...commands.getCommands(), uploadImage]}
                previewOptions={{
                    // linkTarget: "_blank",
                    wrapperClassName: "prose max-w-none",
                    components, // Add custom components here
                }}
                data-color-mode={theme}
            />
        </div>
    );
}

// Initialize in Blade
if (document.getElementById("markdown-editor")) {
    const root = ReactDOM.createRoot(
        document.getElementById("markdown-editor")
    );

    const el = document.getElementById("markdown-editor");
    root.render(
        <MarkdownEditor
            initialContent={el.dataset.initialContent}
            saveRoute={el.dataset.saveRoute}
            uploadRoute={el.dataset.uploadRoute}
        />
    );
}
