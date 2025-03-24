import React, { useState, useEffect, useRef } from "react";
import ReactDOM from "react-dom/client";

const MultiSelect = ({
    options,
    selected = [],
    name,
    placeholder = "Select options",
}) => {
    const [isOpen, setIsOpen] = useState(false);
    const [searchTerm, setSearchTerm] = useState("");
    const [selectedValues, setSelectedValues] = useState(selected);
    const [filteredOptions, setFilteredOptions] = useState(options);
    const wrapperRef = useRef(null);

    useEffect(() => {
        const handleClickOutside = (event) => {
            if (
                wrapperRef.current &&
                !wrapperRef.current.contains(event.target)
            ) {
                setIsOpen(false);
            }
        };
        document.addEventListener("mousedown", handleClickOutside);
        return () =>
            document.removeEventListener("mousedown", handleClickOutside);
    }, []);

    useEffect(() => {
        setFilteredOptions(
            options.filter((option) =>
                option.title.toLowerCase().includes(searchTerm.toLowerCase())
            )
        );
    }, [searchTerm, options]);

    const toggleOption = (value) => {
        const newValues = selectedValues.includes(value)
            ? selectedValues.filter((v) => v !== value)
            : [...selectedValues, value];
        setSelectedValues(newValues);
    };

    return (
        <div className="relative" ref={wrapperRef}>
            {selectedValues.map((value) => (
                <input key={value} type="hidden" name={name} value={value} />
            ))}
            <div
                className="border border-gray-300 dark:border-gray-600 rounded-md p-2 cursor-text"
                onClick={() => setIsOpen(true)}
            >
                <div className="flex flex-wrap gap-2">
                    {selectedValues.map((value) => {
                        const option = options.find((o) => o.id === value);
                        return (
                            <div className="flex flex-row justify-center rounded-2xl dark:bg-gray-200 items-center bg-gray-200">
                                <span
                                    key={value}
                                    className="inline-flex items-center px-2 text-gray-800 rounded-md text-sm"
                                >
                                    {option.title}
                                </span>

                                <button
                                    type="button"
                                    onClick={(e) => {
                                        e.stopPropagation();
                                        toggleOption(value);
                                    }}
                                    className="text-gray-800 hover:text-red-500 hover:dark:text-red-300 mr-2"
                                >
                                    x
                                </button>
                            </div>
                        );
                    })}
                    <input
                        type="text"
                        placeholder={placeholder}
                        className="multi-select-text-field flex-grow min-w-[100px]"
                        value={searchTerm}
                        onChange={(e) => setSearchTerm(e.target.value)}
                        onFocus={() => setIsOpen(true)}
                    />
                </div>
            </div>

            {isOpen && (
                <div className="absolute z-10 mt-1 w-full bg-white dark:bg-[#2D334E] rounded-md shadow-lg border border-gray-200 dark:border-gray-600">
                    <div className="max-h-60 overflow-auto">
                        {filteredOptions.map((option) => (
                            <div
                                key={option.id}
                                className={`px-4 py-2 cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 ${
                                    selectedValues.includes(option.id)
                                        ? "bg-teal-50 dark:bg-teal-900"
                                        : ""
                                }`}
                                onClick={() => toggleOption(option.id)}
                            >
                                <div className="flex items-center">
                                    <input
                                        type="checkbox"
                                        checked={selectedValues.includes(
                                            option.id
                                        )}
                                        readOnly
                                        className="mr-2 rounded border-gray-300 dark:bg-gray-800"
                                    />
                                    <span className="dark:text-gray-300">
                                        {option.title}
                                    </span>
                                </div>
                            </div>
                        ))}
                    </div>
                </div>
            )}
        </div>
    );
};

export default MultiSelect;

// Initialize in Blade
document.querySelectorAll(".multi-select-wrapper").forEach((container) => {
    const options = JSON.parse(container.dataset.options);
    const selected = JSON.parse(container.dataset.selected || "[]");
    const name = container.dataset.name;
    const root = ReactDOM.createRoot(container);

    root.render(
        <MultiSelect options={options} selected={selected} name={name} />
    );
});
