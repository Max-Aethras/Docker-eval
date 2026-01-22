package com.eval.docker.controller;

import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.RestController;
import java.util.List;

@RestController
public class ProductController {
    @GetMapping("/api/products")
    public List<String> getProducts() {
        return List.of("Ordinateur", "Clavier", "Souris");
    }
}