//
//  UserModel.swift
//  PruebaGafa
//
//  Created by Gerardo Mathus on 06/03/18.
//  Copyright © 2018 Alfonso Reyna. All rights reserved.
//

import Foundation

class UserModel {
    
    // ver -> index
    // login -> validar
    // registro -> registrar
    //
    
    func getUserForLogin (email: String, password: String, onCompletion: @escaping (Bool, User) -> Void) {
        do {
            let url = "http://redapptests.tk/heroGuest/user/validate_login?email=\(email)&password=\(password)"
            if let url = URL(string: url) {
                var request = URLRequest(url: url)
                request.httpMethod = "GET"
                print(request)
                let task = URLSession.shared.dataTask(with: request) { data, response, error in
                    guard let dataM = data,error == nil else {
                        print("error =\(String(describing: error))");
                        return
                    }
                    
                    if let httpStatus = response as? HTTPURLResponse, httpStatus.statusCode == 200 {
                        print("\(httpStatus.statusCode)")
                        print("response = \(String(describing: response))")
                        
                        let responseString = String(data: dataM, encoding: .utf8)
                        let subString = self.removeSpecialCharsFromString(text: responseString!)
                        let prefixRange = subString.startIndex.advanced(by: 1)..<subString.startIndex.advanced(by: subString.count - 1)
                        let subsubString = subString.substring(with: prefixRange)
                        let smth = self.convertToDictionary(text: subsubString)
                        print(subsubString)
                        if smth == nil {
                            onCompletion(false, User())
                        } else {
                            if smth!["found"] as? String == "0" {
                                onCompletion(false, User())
                            } else {
                                onCompletion(true, User(json: smth!))
                            }
                        }
                    }
                }
                task.resume()
            } else {
                onCompletion(false, User())
            }
        }
    }
    
    func updateUserDAta (user : User, onCompletion: @escaping (Bool) -> Void) {
        do {
            let url = "http://redapptests.tk/heroGuest/user/update"
            var request = URLRequest(url: URL(string: url)!)
            request.httpMethod = "POST"
            print(user.toStringForUpdate())
            request.httpBody = user.toStringForUpdate().data(using: .utf8)
            print(request)
            let task = URLSession.shared.dataTask(with: request) { data, response, error in
                guard let dataM = data,error == nil else {
                    print("error =\(String(describing: error))");
                    return
                }
                
                if let httpStatus = response as? HTTPURLResponse, httpStatus.statusCode == 200 {
                    print("\(httpStatus.statusCode)")
                    print("response = \(String(describing: response))")
                    let responseString = String(data: dataM, encoding: .utf8)
                    let subString = self.removeSpecialCharsFromString(text: responseString!)
                    let prefixRange = subString.startIndex.advanced(by: 1)..<subString.startIndex.advanced(by: subString.count - 1)
                    let subsubString = subString.substring(with: prefixRange)
                    if subsubString == "0" {
                        onCompletion(false)
                    } else {
                        onCompletion(true)
                    }
                }
            }
            task.resume()
        }
    }
    
    func postUser (user: User, onCompletion: @escaping (Bool, User) -> Void) {
        do {
            print(user.toString())
            let url = "http://redapptests.tk/heroGuest/user/create?\(user.toString())"
            if let url = URL(string: url) {
                var request = URLRequest(url: url)
                request.httpMethod = "GET"
                print(request)
                let task = URLSession.shared.dataTask(with: request) { data, response, error in
                    guard let dataM = data,error == nil else {
                        print("error =\(String(describing: error))");
                        return
                    }
                    
                    if let httpStatus = response as? HTTPURLResponse, httpStatus.statusCode == 200 {
                        print("\(httpStatus.statusCode)")
                        print("response = \(String(describing: response))")
                        
                        let responseString = String(data: dataM, encoding: .utf8)
                        print(responseString)
                        let subString = self.removeSpecialCharsFromString(text: responseString!)
                        let prefixRange = subString.startIndex.advanced(by: 1)..<subString.startIndex.advanced(by: subString.count - 1)
                        let subsubString = subString.substring(with: prefixRange)
                        let smth = self.convertToDictionary(text: subsubString)
                        if smth == nil {
                            onCompletion(false, User())
                        } else {
                            onCompletion(true, User(json: smth!))
                        }
                    }
                }
                task.resume()
            } else {
                onCompletion(false, User())
            }
        }
    }
    
    func removeSpecialCharsFromString(text: String) -> String {
        let okayChars : Set<Character> =
            Set("abcdefghijklmnopqrstuvwxyz ABCDEFGHIJKLKMNOPQRSTUVWXYZ1234567890+-*=(){},.:!_\"".characters)
        return String(text.characters.filter {okayChars.contains($0) })
    }
    
    func convertToDictionary(text: String) -> [String: Any]? {
        if let data = text.data(using: .utf8) {
            do {
                return try JSONSerialization.jsonObject(with: data, options: []) as? [String: Any]
            } catch {
                print(error.localizedDescription)
            }
        }
        return nil
    }
    
}
