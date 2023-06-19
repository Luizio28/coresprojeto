function clamp(input, min, max) {
    if (input.value > max) input.value = max
    if (input.value < min) input.value = min
}