"use strict";
var __decorate = (this && this.__decorate) || function (decorators, target, key, desc) {
    var c = arguments.length, r = c < 3 ? target : desc === null ? desc = Object.getOwnPropertyDescriptor(target, key) : desc, d;
    if (typeof Reflect === "object" && typeof Reflect.decorate === "function") r = Reflect.decorate(decorators, target, key, desc);
    else for (var i = decorators.length - 1; i >= 0; i--) if (d = decorators[i]) r = (c < 3 ? d(r) : c > 3 ? d(target, key, r) : d(target, key)) || r;
    return c > 3 && r && Object.defineProperty(target, key, r), r;
};
Object.defineProperty(exports, "__esModule", { value: true });
exports.VotePresidentModule = void 0;
const common_1 = require("@nestjs/common");
const typeorm_1 = require("@nestjs/typeorm");
const vote_president_entity_1 = require("./vote-president.entity");
const vote_president_service_1 = require("./vote-president.service");
const vote_president_controller_1 = require("./vote-president.controller");
let VotePresidentModule = class VotePresidentModule {
};
exports.VotePresidentModule = VotePresidentModule;
exports.VotePresidentModule = VotePresidentModule = __decorate([
    (0, common_1.Module)({
        imports: [typeorm_1.TypeOrmModule.forFeature([vote_president_entity_1.VotePresident])],
        providers: [vote_president_service_1.VotePresidentService],
        controllers: [vote_president_controller_1.VotePresidentController],
    })
], VotePresidentModule);
//# sourceMappingURL=vote-president.module.js.map